<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\CatsForm.
 *
 */

namespace Drupal\pablo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CatsForm extends FormBase{

  public function getFormId() {
    return 'cats_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#description' => $this->t('The minimum length of the name is 2 characters, and the maximum is 32'),
      '#attributes' => [
        'class' => [
          'form-name'
        ]
      ]
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#attributes' => [
        'class' => [
          'form-submit'
        ]
      ]
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }
}
