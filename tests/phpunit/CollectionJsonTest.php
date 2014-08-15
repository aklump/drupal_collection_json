<?php
/**
 * @file
 * Unit tests for the collection_json module
 *
 * @ingroup collection_json
 * @{
 */
require_once 'vendor/autoload.php';
// install with composer dumpautoload

class CollectionJsonTest extends \PHPUnit_Framework_TestCase {
  
  public function test__collection_json_version_compare() {
    $this->assertFalse(_collection_json_version_compare('7.x-3.3', '7.x-3.4'));
    $this->assertTrue(_collection_json_version_compare('7.x-3.4', '7.x-3.4'));
    $this->assertTrue(_collection_json_version_compare('7.x-3.5', '7.x-3.4'));
  }
}
