<?php
/**
 * @file
 * Provides parsing for application/vnd.collection+json
 *
 * @ingroup collection_json
 * @{
 */

use \AKlump\Http\CollectionJson\CollectionJsonToJson;
use \AKlump\Http\Transfer\Payload;

class CollectionJSONParserCollectionJSON implements ServicesParserInterface {
  public function parse(ServicesContextInterface $context) {
    $data = '';
    if (($source = $context->getRequestBody())) {
      collection_json_load();
      $source = new Payload('application/vnd.collection+json', $source);
      $result = CollectionJsonToJson::translate($source)->getContent();
      if (!($data = json_decode($result, TRUE))) {
        return services_error($result, 406);
      }
    }

    return $data;
  }
}
