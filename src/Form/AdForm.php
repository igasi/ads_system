<?php

/**
 * @file
 * Contains \Drupal\ads_system\Form\AdForm.
 */

namespace Drupal\ads_system\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Ad edit forms.
 *
 * @ingroup ads_system
 */
class AdForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\ads_system\Entity\Ad */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Ad.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Ad.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.ad.canonical', ['ad' => $entity->id()]);
  }

}