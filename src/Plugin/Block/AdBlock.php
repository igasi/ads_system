<?php

/**
 * @file
 * Contains \Drupal\ads_system\Plugin\Block\AdBlock.
 */

namespace Drupal\ads_system\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'AdBlock' block.
 *
 * @Block(
 *  id = "ad_block",
 *  admin_label = @Translation("Ad block"),
 *  category = @Translation("Ad blocks"),
 *  deriver = "Drupal\ads_system\Plugin\Derivative\AdDerivativesBlock"
 * )
 */
class AdBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var $blockAdType
   */
  protected $blockAdType;

  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
        array $configuration,
        $plugin_id,
        $plugin_definition
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->blockAdType = $this->getDerivativeId();

  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }



  /**
   * {@inheritdoc}
   */
  public function build() {

    $config =  \Drupal::config('ads_system.settings');

    $build = [
//      '#markup' => '<div id="ad-' . $this->blockAdType . '" class="block-entity-ads ' . $this->blockAdType . '" >' . $this->blockAdType . '</div>',
      '#markup' => '<div id="ad-' . $this->blockAdType . '" class="block-entity-ads ' . $this->blockAdType . '" ></div>',
      '#attached' => array(
        'library' =>  array(
            'ads_system/ads-system'
        )
      )
    ];

    return $build;
  }

}
