<?php
/**
 * @file
 * Extends the basic REST views to include a response formatter for collection+json
 *
 */
use \AKlump\Http\CollectionJson\Collection;
use \AKlump\Http\CollectionJson\Item;
use \AKlump\Http\CollectionJson\Data;

class RESTServerViewCollectionJSON extends RESTServerViewBuiltIn {
  
  public function render() {
    collection_json_load();

    // If self::model is not a Collection object, but the format is
    // collection_json then we need to force it into a collection_json object.
    if ($this->arguments['format'] === 'collection_json'
      && ! $this->model instanceof Collection) {
      $href = url($_GET['q'], array('absolute' => TRUE));
      $item = new Item($href);
      foreach ($this->model as $key => $value) {
        $item->addData(new Data($key, $value));
      }
      $this->model = new Collection($href);
      $this->model->addItem($item);
    }

    // We might need to pull out the raw data if we have a Collection object
    // but the format is not collection object.
    if ($this->model instanceof Collection
      && $this->arguments['format'] !== 'collection_json') {
      $this->model = json_decode(CollectionJsonToJson::translate($source)->getContent(), TRUE);
    }

    // Now parse as needed
    if ($this->arguments['format'] === 'collection_json') {
      return $this->model->getContent();
    }
    else {
      return parent::render();
    }
  }
}