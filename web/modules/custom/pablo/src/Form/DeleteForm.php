<?php
/**
 * @file
 * Contains \Drupal\pablo\Form\DeleteForm.
 *
 */

namespace Drupal\pablo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DeleteForm extends FormBase{
  public function getFormId() {
    return 'delete_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attributes']['class'][] = 'form-delete';

    $form['title'] = [
      '#type' => 'html_tag',
      '#tag' => 'h3',
      '#value' => $this->t('Are you sure you want to delete the current entry?'),
      '#attributes' => [
        'class' => [
          'form-title'
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

    $form['id-item'] = [
      '#type' => 'hidden',
      '#attributes' => [
        'class' => [
          'form-id-item'
        ]
      ]
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $query = \Drupal::database()->delete('pablo');
    $idValue = $form_state->getValue('id-item');
    $query->condition('id', $idValue);
    $query->execute();
    \Drupal::messenger()->addStatus($this->t('Entry deleted successfully.'));
  }

}
