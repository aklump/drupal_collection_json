<?php
/**
 * @file
 * Provides a formatter for collection+json objects.
 */

use \AKlump\Http\CollectionJson\Collection;

class CollectionJSONCollectionJSONFormatter implements ServicesFormatterInterface {
  public function render($data) {
    if ($data && $data instanceof Collection) {    
      collection_json_load();

      return $data->getContent();
    }
  }
}