<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\CatsForm.
 *
 */

namespace Drupal\pablo\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#description' => $this->t('The name can only contain Latin letters, underscores or hyphens.'),
      '#required' => TRUE,
      '#attributes' => [
        'class' => [
          'form-email'
        ]
      ],
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
      $ajax_response->addCommand(new MessageCommand('The minimum length of the name is 2 characters, and the maximum is 32', '#form-system-messages', ['type' => 'error']));
    }
    else{
      $ajax_response->addCommand(new MessageCommand('Thank you very much for your message. The input data is valid',  '#form-system-messages', ['type' => 'status']));
    }
    return $ajax_response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

}
