<?php

namespace Drupal\pablo\Controller;

/**
 * Contains \Drupal\pablo\Controller\CatsListController.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the pablo module.
 */
class CatsListController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    $db = \Drupal::database();
    $query = $db->select("pablo", "p");
    $query->fields("p", ["id", "cat_name", "email", "cat_photo", "timestamp"]);
    $query->orderBy("timestamp", "DESC");
    $result = $query->execute()->fetchAll();

    $deleteForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\DeleteForm");
    $editForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\EditForm");
    $deleteAllForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\DeleteAllForm");
    $deleteMultipleForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\DeleteMultipleForm");
    return [
      "#theme" => "cats-list",
      "#items" => $result,
      "#DeleteForm" => $deleteForm,
      "#EditForm" => $editForm,
      "#DeleteAllForm" => $deleteAllForm,
      "#DeleteMultipleForm" => $deleteMultipleForm,
    ];
  }

}
