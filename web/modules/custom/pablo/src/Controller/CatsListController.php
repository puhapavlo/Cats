<?php
/**
 * @return
 * Contains \Drupal\pablo\Controller\CatsListController.
 */

namespace Drupal\pablo\Controller;


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
    $query = $db->select('pablo', 'p');
    $query->fields('p', ['id', 'cat_name', 'email', 'cat_photo', 'timestamp']);
    $query->orderBy('timestamp', 'DESC');
    $result = $query->execute()->fetchAll();

    $DeleteForm = \Drupal::formBuilder()->getForm('Drupal\pablo\Form\DeleteForm');
    $EditForm = \Drupal::formBuilder()->getForm('Drupal\pablo\Form\EditForm');
    $DeleteAllForm = \Drupal::formBuilder()->getForm('Drupal\pablo\Form\DeleteAllForm');
    return [
      '#theme' => 'cats-list',
      '#items' => $result,
      '#DeleteForm' => $DeleteForm,
      '#EditForm' => $EditForm,
      '#DeleteAllForm' => $DeleteAllForm,
    ];
  }

}
