<?php
/**
 * @file
 * Drupal mock functions to allow easier phpunit testing in D7
 *
 * To utilize this file add the first line of files as seen below to composer.json
 * You will also need to include the module files as well.
 * 
 * @code
 * {
 *   "autoload": {
 *     "files": [
 *       "phpunit_mocks/drupal7_mocks.php",
 *       "../gop_facets.module",
 *       "../includes/gop_facets.develop.inc"
 *     ]
 *   }
 * } * @endcode
 *
 */

// Constants
define(LANGUAGE_NONE, 'und');

// Functions
function drupal_static($name, $default_value = NULL, $reset = FALSE) {
  return $default_value;
}

function element_children($array) {
  $children = array();
  foreach (array_keys($array) as $key) {
    if (substr($key, 0, 1) !== '#') {
      $children[] = $key;
    }
  }

  return $children;
}

function variable_get($name, $default) {
  global $conf;

  return isset($conf[$name]) ? $conf[$name] : $default;
}

function variable_set($name, $value) {
  global $conf;
  $conf[$name] = $default;
}

function module_load_include(){};
