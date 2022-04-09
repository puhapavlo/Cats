<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\DeleteAllForm.
 *
 */

namespace Drupal\pablo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DeleteAllForm extends FormBase{
  public function getFormId() {
    return 'delete_all_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attributes']['class'][] = 'form-delete-all';

    $form['title'] = [
      '#type' => 'html_tag',
      '#tag' => 'h3',
      '#value' => $this->t('Are you sure you want to delete all entries?'),
      '#attributes' => [
        'class' => [
          'form-title'
        ]
      ]
    ];

    $form['cancel'] = [
      '#type' => 'button',
      '#value' => $this->t('CANCEL'),
      '#attributes' => [
        'class' => [
          'form-submit',
          'form-cancel'
        ]
      ]
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('OK'),
      '#attributes' => [
        'class' => [
          'form-submit',
          'form-submit-delete'
        ]
      ],
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::database()->truncate('pablo')->execute();
    \Drupal::messenger()->addStatus($this->t('All entry deleted successfully.'));
  }

}
