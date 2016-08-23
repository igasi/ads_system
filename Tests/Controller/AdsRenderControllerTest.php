<?php

/**
 * @file
 * Contains \Drupal\ads_system\Tests\AdsRenderController.
 */

namespace Drupal\ads_system\Tests;

use Drupal\simpletest\WebTestBase;
use Drupal\Core\Entity\EntityManager;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Form\FormAjaxResponseBuilder;

/**
 * Provides automated tests for the ads_system module.
 */
class AdsRenderControllerTest extends WebTestBase {

  /**
   * Drupal\Core\Entity\EntityManager definition.
   *
   * @var Drupal\Core\Entity\EntityManager
   */
  protected $entity_manager;

  /**
   * Drupal\Core\Entity\Query\QueryFactory definition.
   *
   * @var Drupal\Core\Entity\Query\QueryFactory
   */
  protected $entity_query;

  /**
   * Drupal\Core\Form\FormAjaxResponseBuilder definition.
   *
   * @var Drupal\Core\Form\FormAjaxResponseBuilder
   */
  protected $form_ajax_response_builder;
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "ads_system AdsRenderController's controller functionality",
      'description' => 'Test Unit for module ads_system and controller AdsRenderController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests ads_system functionality.
   */
  public function testAdsRenderController() {
    // Check that the basic functions of module ads_system.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
