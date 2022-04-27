<?php

namespace Drupal\pablo\Plugin\Block;

/**
 * @file
 * Contains \Drupal\pablo\Plugin\Block\CatsItems.
 */

use Drupal\Core\Block\BlockBase;

/**
 * Provides a CatsItems.
 *
 * @Block(
 *   id = "cats_items",
 *   admin_label = @Translation("Cats items")
 * )
 */
class CatsItems extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $db = \Drupal::database();
    $query = $db->select("pablo", "p");
    $query->fields("p", ["id", "cat_name", "email", "cat_photo", "timestamp"]);
    $query->orderBy("timestamp", "DESC");
    $result = $query->execute()->fetchAll();
    return [
      "#theme" => "cats-items",
      "#items" => $result,
    ];
  }

}
