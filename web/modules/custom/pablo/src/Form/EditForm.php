<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\EditForm.
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

class EditForm extends FormBase {

  public function getFormId() {
    return 'edit_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $query = \Drupal::database()->select('pablo', 'p');
    $query->fields('p', ['cat_name', 'email', 'cat_photo']);
    $query->condition('id', $form_state->getValue('id-item-edit'));
    $result = $query->execute()->fetchAll();

    $form['#attributes']['class'][] = 'form-edit';

    $form['system_messages'] = [
      '#markup' => '<div id="form-messages"></div>',
      '#weight' => -100,
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#description' => $this->t('The minimum length of the name is 2 characters, and the maximum is 32'),
      '#attributes' => [
        'class' => [
          'form-name',
          'form-name-edit'
        ],
        '#value' => $result[0]['cat_name'],
      ],
    ];

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your email:'),
      '#description' => $this->t('The email can only contain Latin letters, underscores or hyphens.'),
      '#required' => TRUE,
      '#attributes' => [
        'class' => [
          'form-email',
          'form-email-edit'
        ]
      ],
      '#ajax' => [
        'callback' => '::validateEmailAjax',
        'event' => 'input',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    ];

    $form['field_image'] = [
      '#title' => $this->t('Change photo of your cat:'),
      '#type' => 'managed_file',
      '#description' => 'The image format should be jpeg, jpg, png and the file size should not exceed 2 MB',
      '#upload_validators' => [
        'file_validate_extensions' => ['jpg jpeg png'],
        'file_validate_size' => [2000000],
      ],
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://images',
    ];

    $form['cancel'] = [
      '#type' => 'button',
      '#value' => $this->t('CANCEL'),
      '#attributes' => [
        'class' => [
          'form-submit',
          'form-cancel',
          'form-cancel-edit'
        ]
      ]
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('UPDATE CAT'),
      '#attributes' => [
        'class' => [
          'form-submit'
        ]
      ],
    ];

    $form['id-item-edit'] = [
      '#type' => 'hidden',
      '#attributes' => [
        'class' => [
          'form-id-item-edit'
        ]
      ]
    ];

    return $form;
  }

  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $patternEmail = '/^[a-z-_]+$/i';
    if (preg_match($patternEmail, $form_state->getValue('email'))) {
      $ajax_response->addCommand(new MessageCommand($this->t('Email is valid'), '#form-messages', ['type' => 'status'], TRUE));
      $ajax_response->addCommand(new CssCommand('.form-email-edit', ['border' => '2px solid black']));
    }
    else {
      $ajax_response->addCommand(new MessageCommand($this->t('The email can only contain Latin letters, underscores or hyphens.'), '#form-messages', ['type' => 'error'], TRUE));
      $ajax_response->addCommand(new CssCommand('.form-email-edit', ['border' => '2px solid red']));
    }
    return $ajax_response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('name')) < 2 || strlen($form_state->getValue('name')) > 32) {
      \Drupal::messenger()->addError($this->t('The minimum length of the name is 2 characters, and the maximum is 32.'));
    }
    elseif (!preg_match('/^[a-z-_]+$/i', $form_state->getValue('email'))) {
      \Drupal::messenger()->addError($this->t('The email can only contain Latin letters, underscores or hyphens.'));
    }
    elseif ($form_state->getValue('field_image') == NULL) {
      $query = \Drupal::database()->update('pablo');
      $query->fields([
        'cat_name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
      ]);
      $query->condition('id', $form_state->getValue('id-item-edit'));
      $query->execute();
    }
    else{
      $query = \Drupal::database()->update('pablo');
      $fid = $form_state->getValue('field_image');
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
      $uri = $file->getFileUri();
      $url = file_create_url($uri);
      $query->fields([
        'cat_name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
        'cat_photo' => $url,
      ]);
      $query->condition('id', $form_state->getValue('id-item-edit'));
      $query->execute();
    }
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

}
