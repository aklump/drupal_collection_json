<?php
/**
 * @file
 * Defines an extension class for parseing Collection+Json
 */
use \AKlump\Http\CollectionJson\CollectionJsonToJson;
use \AKlump\Http\Transfer\Payload;

/**
 * Represents a rest server object with support for CollectionJSON.
 */
class RESTServerCollectionJSON extends RESTServer {
  
  /**
   * Pulls and returns the data portion from application/vnd.collection+json
   *
   * @param  Resource $handle
   *
   * @return mixed
   */
  public function parseCollectionJSON($handle) {
    $data = '';
    if (($source = self::contentFromStream($handle))) {
      collection_json_load();
      $source = new Payload('application/vnd.collection+json', $source);
      $data = json_decode(CollectionJsonToJson::translate($source)->getContent(), TRUE);
    }

    return $data;
  }
}