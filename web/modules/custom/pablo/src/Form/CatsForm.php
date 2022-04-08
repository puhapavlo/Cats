<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\CatsForm.
 *
 */

namespace Drupal\pablo\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

class CatsForm extends FormBase{

  public function getFormId() {
    return 'cats_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['system_messages'] = [
      '#markup' => '<div id="form-system-messages"></div>',
      '#weight' => -100,
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#description' => $this->t('The minimum length of the name is 2 characters, and the maximum is 32'),
      '#attributes' => [
        'class' => [
          'form-name'
        ]
      ],
    ];

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your email:'),
      '#description' => $this->t('The email can only contain Latin letters, underscores or hyphens.'),
      '#required' => TRUE,
      '#attributes' => [
        'class' => [
          'form-email'
        ]
      ],
      '#ajax' => [
        'callback' => '::validateEmailAjax',
        'event' => 'input',
        'progress' => array(
          'type' => 'throbber',
        ),
      ],
    ];

    $form['field_image'] = [
        '#title' => $this->t('Photo of your cat:'),
        '#type' => 'managed_file',
        '#description' => 'The image format should be jpeg, jpg, png and the file size should not exceed 2 MB',
        '#upload_validators' => [
          'file_validate_extensions' => ['jpg jpeg png'],
          'file_validate_size' => [2000000],
        ],
        '#preview_image_style' => 'medium',
        '#upload_location' => 'public://images',
        '#required' => TRUE,
  ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#attributes' => [
        'class' => [
          'form-submit'
        ]
      ],
      '#ajax'=> [
        'callback' => '::ajaxSubmitCallback',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ]
    ];

    return $form;
  }

  public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();

    if(strlen($form_state->getValue('name')) < 2 || strlen($form_state->getValue('name')) > 32){
      $ajax_response->addCommand(new MessageCommand($this->t('The minimum length of the name is 2 characters, and the maximum is 32'), '#form-system-messages', ['type' => 'error']));
    }

    elseif(!preg_match('/^[a-z-_]+$/i', $form_state->getValue('email'))){
      $ajax_response->addCommand(new MessageCommand($this->t('The email can only contain Latin letters, underscores or hyphens.'),  '#form-system-messages', ['type' => 'error'], TRUE));
      $ajax_response->addCommand(new CssCommand('.form-email', ['border' => '2px solid red']));
    }

    else{
      $conn = Database::getConnection();

      $fields["cat_name"] = $form_state->getValue('name');
      $fields["email"] = $form_state->getValue('email');
      $fid = $form_state->getValue('field_image');
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
      $uri = $file->getFileUri();
      $url = file_create_url($uri);
      $fields["cat_photo"] = $url;
      $current_timestamp = \Drupal::time()->getCurrentTime();
      $todays_date = \Drupal::service('date.formatter')->format($current_timestamp, 'custom', 'd/M/Y H:i:s');
      $fields["timestamp"] = $todays_date;

      $conn->insert('pablo')->fields($fields)->execute();

      $ajax_response->addCommand(new MessageCommand($this->t('Thank you very much for your message. The input data is valid'),  '#form-system-messages', ['type' => 'status']));
    }
    return $ajax_response;
  }

  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $patternEmail = '/^[a-z-_]+$/i';
    if (preg_match($patternEmail, $form_state->getValue('email'))) {
      $ajax_response->addCommand(new MessageCommand($this->t('Email is valid'),  '#form-system-messages', ['type' => 'status'], TRUE));
    }
    else{
      $ajax_response->addCommand(new MessageCommand($this->t('The email can only contain Latin letters, underscores or hyphens.'),  '#form-system-messages', ['type' => 'error'], TRUE));
      $ajax_response->addCommand(new CssCommand('.form-email', ['border' => '2px solid red']));
    }
    return $ajax_response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

}
