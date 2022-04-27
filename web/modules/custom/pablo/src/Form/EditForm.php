<?php

namespace Drupal\pablo\Form;

/**
 * @file
 * Contains \Drupal\pablo\Form\EditForm.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Provides form for the pablo module.
 */
class EditForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'edit_form';
  }

  /**
   * {@inheritdoc}
   */
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
          'form-name-edit',
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
          'form-email-edit',
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
          'form-cancel-edit',
        ],
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('UPDATE'),
      '#attributes' => [
        'class' => [
          'form-submit',
        ],
      ],
    ];

    $form['id-item-edit'] = [
      '#type' => 'hidden',
      '#attributes' => [
        'class' => [
          'form-id-item-edit',
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('name')) < 2 || strlen($form_state->getValue('name')) > 32) {
      \Drupal::messenger()->addError($this->t('The minimum length of the name is 2 characters, and the maximum is 32.'));
    }
    elseif (!preg_match('/^.+@.+.\..+$/i', $form_state->getValue('email'))) {
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
      \Drupal::messenger()->addStatus($this->t('Entry modified successfully.'));
    }
    else {
      $query = \Drupal::database()->update('pablo');
      $fid = $form_state->getValue('field_image');
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
      $uri = $file->getFileUri();
      $url = \Drupal::service('file_url_generator')->generateAbsoluteString($uri);
      $query->fields([
        'cat_name' => $form_state->getValue('name'),
        'email' => $form_state->getValue('email'),
        'cat_photo' => $url,
      ]);
      $query->condition('id', $form_state->getValue('id-item-edit'));
      $query->execute();
      \Drupal::messenger()->addStatus($this->t('Entry modified successfully.'));
    }
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

}
