<?php
/**
 * @file
 * Extends the basic REST views to include a response formatter for collection+json
 *
 */
use \AKlump\Http\CollectionJson\Collection;
use \AKlump\Http\CollectionJson\CollectionJsonToJson;
use \AKlump\Http\CollectionJson\Item;
use \AKlump\Http\CollectionJson\Data;

class RESTServerViewCollectionJSON extends RESTServerViewBuiltIn {
  
  public function render() {

    if (empty($this->model)) {
      return NULL;
    }
    
    collection_json_load();

    // If self::model is not a Collection object, but the format is
    // collection_json then we need to force it into a collection_json object.
    if ($this->arguments['format'] === 'collection_json'
      && ! $this->model instanceof Collection) {

      $data = $this->model;
      $this->model = collection_json_new_collection();
      $item = new Item($this->model->getHref());
      foreach ($this->model as $key => $value) {
        $item->addData(new Data($key, $value));
      }
      
      $this->model->addItem($item);
    }

    // We might need to pull out the raw data if we have a Collection object
    // but the format is not collection object.
    if ($this->model instanceof Collection) {
      switch ($this->arguments['format']) {
        case 'json':
          return CollectionJsonToJson::translate($this->model)->getContent();
        
        case 'collection_json':
          return $this->model->getContent();
      }
    }

    return parent::render();
  }
}