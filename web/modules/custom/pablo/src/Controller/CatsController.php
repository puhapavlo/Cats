<?php
/**
 * @return
 * Contains \Drupal\pablo\Controller\CatsController.
 */

namespace Drupal\pablo\Controller;


/**
 * Provides route responses for the pablo module.
 */
class CatsController{

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    return [
      '#theme' => 'cats_template',
      '#catsTitle' => 'Hello! You can add here a photo of your cat.',
    ];
  }

}
