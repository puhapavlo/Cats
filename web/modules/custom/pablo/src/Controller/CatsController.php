<?php

namespace Drupal\pablo\Controller;

/**
 * Contains \Drupal\pablo\Controller\CatsController.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the pablo module.
 */
class CatsController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    $catsForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\CatsForm");
    $deleteForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\DeleteForm");
    $editForm = \Drupal::formBuilder()->getForm("Drupal\pablo\Form\EditForm");

    $blockManager = \Drupal::service("plugin.manager.block");
    $config = [];
    $catsItemsBlock = $blockManager->createInstance("cats_items", $config);
    return [
      "#theme" => "cats_template",
      "#catsTitle" => "Hello! You can add here a photo of your cat.",
      "#form" => $catsForm,
      "#cats" => $catsItemsBlock->build(),
      "#DeleteForm" => $deleteForm,
      "#EditForm" => $editForm,
    ];
  }

}
