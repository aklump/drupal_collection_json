<?php
use \AKlump\LoftLib\Api\CollectionJsonToJson;
use \AKlump\LoftLib\Api\Payload;
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
      module_load_include('php', 'collection_json', 'vendor/autoload');
      $source = new Payload('application/vnd.collection+json', $source);
      $data = json_decode(CollectionJsonToJson::translate($source)->getContent(), TRUE);
    }

    return $data;
  }
}