<?php
/**
 * @file
 * Contains \Drupal\pablo\Plugin\Block\cats_items.
 */
namespace Drupal\pablo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a cats_items.
 *
 * @Block(
 *   id = "cats_items",
 *   admin_label = @Translation("Cats items")
 * )
 */
class cats_items extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $db = \Drupal::database();
    $query = $db->select('pablo', 'p');
    $query->fields('p', ['id', 'cat_name', 'email', 'cat_photo', 'timestamp']);
    $query->orderBy('timestamp', 'DESC');
    $result = $query->execute()->fetchAll();
    return array(
      '#theme' => 'cats-items',
      '#items' => $result,
    );
  }
}
