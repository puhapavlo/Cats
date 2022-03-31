<?php
/**
 * @return
 * Contains \Drupal\pablo\Controller\CatsController.
 */

namespace Drupal\pablo\Controller;

/**
 * Provides route responses for the DrupalBook module.
 */
class CatsController {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function content() {
    $element = [
      '#type' => 'html_tag',
      '#tag' => 'h1',
      '#value' => 'Hello! You can add here a photo of your cat.',
      '#attributes' => [
        'class' => ['cats-title'],
      ],
    ];
    return $element;
  }

}
