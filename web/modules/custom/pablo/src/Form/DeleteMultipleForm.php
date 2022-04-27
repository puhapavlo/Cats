<?php

namespace Drupal\pablo\Form;

/**
 * @file
 * Contains \Drupal\pablo\Form\DeleteMultipleForm.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides form for the pablo module.
 */
class DeleteMultipleForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return "delete_multiple_form";
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form["#attributes"]["class"][] = "form-delete-multiple";

    $form["title"] = [
      "#type" => "html_tag",
      "#tag" => "h3",
      "#value" => $this->t("Are you sure you want to delete the selected entries?"),
      "#attributes" => [
        "class" => [
          "form-title",
        ],
      ],
    ];

    $form["cancel"] = [
      "#type" => "button",
      "#value" => $this->t("CANCEL"),
      "#attributes" => [
        "class" => [
          "form-submit",
          "form-cancel",
          "form-cancel-multiple",
        ],
      ],
    ];

    $form["actions"]["submit"] = [
      "#type" => "submit",
      "#value" => $this->t("OK"),
      "#attributes" => [
        "class" => [
          "form-submit",
          "form-selected-delete",
        ],
      ],
    ];

    $form["id-item"] = [
      "#type" => "hidden",
      "#attributes" => [
        "class" => [
          "form-id-item-multiple",
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue("id-item") == NULL) {
      \Drupal::messenger()->addStatus($this->t("Nothing selected."));
    }
    else {
      $items = explode(" ", $form_state->getValue("id-item"));
      $query = \Drupal::database()->delete("pablo");
      $query->condition("id", $items, "IN");
      $query->execute();

      \Drupal::messenger()->addStatus($this->t("Entries deleted successfully."));
    }
  }

}
