<?php
/**
 * @file
 * Unit tests for the collection_json module
 *
 * @ingroup collection_json
 * @{
 */
require_once dirname(__FILE__) . '/vendor/autoload.php';

class CollectionJsonTest extends \PHPUnit_Framework_TestCase {

  public function test__collection_json_parse_error_array() {
    $subject = array (
      'code' => 403,
      'header_message' => '403 :Not Approved: User has not yet granted access',
      'body_data' => '',
    );
    $this->assertSame(array(
      403,
      'Not Approved',
      'User has not yet granted access'
    ), _collection_json_parse_error_array($subject));

    $subject = array (
      'code' => 403,
      'header_message' => '403 :Not Approved: User has not yet granted access',
      'body_data' => 'Not Approved: User has not yet granted access',
    );
    $this->assertSame(array(
      403,
      'Not Approved',
      'User has not yet granted access'
    ), _collection_json_parse_error_array($subject));

    $subject = array(
      'code' => NULL,
      'header_message' => '404 :Not found: Could not find the controller.',
      'body_data' => '',
    );
    $this->assertSame(array(
      404,
      'Not found',
      'Could not find the controller.'
    ), _collection_json_parse_error_array($subject));

    $subject = array(
      'code' => 404,
      'header_message' => '404 :Not found: Could not find the controller.',
      'body_data' => 'Could not find the controller.',
    );
    $this->assertSame(array(
      404,
      'Not found',
      'Could not find the controller.'
    ), _collection_json_parse_error_array($subject));

    $subject = array(
      'code' => 403,
      'header_message' => '404 :Forbidden: Access denied for user anonymous',
      'body_data' => 'Access denied for user anonymous'
    );
    $this->assertSame(array(
      403,
      'Forbidden',
      'Access denied for user anonymous'
    ), _collection_json_parse_error_array($subject));

    $subject = array(
      'code' => 403,
      'header_message' => '403 :Access denied for user anonymous',
      'body_data' => 'Access denied for user anonymous'
    );
    $this->assertSame(array(
      403,
      'Access denied for user anonymous',
      'Access denied for user anonymous'
    ), _collection_json_parse_error_array($subject));
  }
  
  public function test__collection_json_version_compare() {
    $this->assertFalse(_collection_json_version_compare('7.x-3.3', '7.x-3.4'));
    $this->assertTrue(_collection_json_version_compare('7.x-3.4', '7.x-3.4'));
    $this->assertTrue(_collection_json_version_compare('7.x-3.5', '7.x-3.4'));
  }
}
