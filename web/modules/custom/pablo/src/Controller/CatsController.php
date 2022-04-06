<?php
/**
 * @return
 * Contains \Drupal\pablo\Controller\CatsController.
 */

namespace Drupal\pablo\Controller;


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
    $CatsForm = \Drupal::formBuilder()->getForm('Drupal\pablo\Form\CatsForm');
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $cats_items_block = $block_manager->createInstance('cats_items', $config);
    return [
      '#theme' => 'cats_template',
      '#catsTitle' => 'Hello! You can add here a photo of your cat.',
      '#form' => $CatsForm,
      '#cats' => $cats_items_block->build(),
    ];
  }

}
