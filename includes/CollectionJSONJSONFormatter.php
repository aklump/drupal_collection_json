<?php
/**
 * @file
 * Extends the basic JSON formatter to handle CollectionJSON objects.
 */

use \AKlump\Http\CollectionJson\Collection;
use \AKlump\Http\CollectionJson\CollectionJsonToJson;

class CollectionJSONJSONFormatter extends ServicesJSONFormatter {
  public function render($data) {
    if ($data) {
      collection_json_load();

      // We might need to pull out the raw data if we have a Collection object
      // but the format is not collection object.
      if ($data instanceof Collection) {
        return CollectionJsonToJson::translate($data)->getContent();
      }

      return parent::render($data);
    }
  }
}