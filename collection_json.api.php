<?php
/**
 * @file
 * Define the api functions provided by this module.
 *
 */

/**
 * Implements hook_collection_json_entity_item_alter().
 */
function hook_collection_json_entity_item_alter($item, $entity_type, $entity) {
  
}

/**
 * Implements hook_collection_json_bundle_template_alter().
 */
function hook_collection_json_bundle_template_alter($template, $entity_type, $bundle_name, $context) {
  
}

/**
 * Implements hook_collection_json_config().
 */
function hook_collection_json_config_alter($config) {

  // Disable the autoloading of classes by this module.  Set to false if your
  // module provides the library from
  // https://packagist.org/packages/aklump/collection_json.
  $config->autoload = FALSE;
}