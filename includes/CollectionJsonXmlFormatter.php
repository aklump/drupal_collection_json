<?php
/**
 * @file
 * Extends the basic JSON formatter to handle CollectionJSON objects.
 */

use \AKlump\Http\CollectionJson\Collection;
use \AKlump\Http\CollectionJson\CollectionJsonToJson;
use \AKlump\Http\Transfer\JsonToXml;

class CollectionJsonXmlFormatter extends ServicesXMLFormatter {
  public function render($data) {
    if ($data) {
      collection_json_load();

      // We might need to pull out the raw data if we have a Collection object
      // but the format is not collection object.
      if ($data instanceof Collection) {
        $data = CollectionJsonToJson::translate($data);
        $xml  = JsonToXml::translate($data)->getContent();
        
        return $xml;
      }

      return parent::render($data);
    }
  }
}