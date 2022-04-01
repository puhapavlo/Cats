<?php
/**
 * @return
 * Contains \Drupal\pablo\Controller\CatsController.
 */

namespace Drupal\pablo\Controller;

/**
 * Provides route responses for the pablo module.
 */
class CatsController {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    return [
      '#type' => 'html_tag',
      '#tag' => 'h1',
      '#value' => 'Hello! You can add here a photo of your cat.',
      '#attributes' => [
        'class' => ['cats-title'],
      ],
    ];
  }

}
