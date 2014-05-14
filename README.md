# Drupal Module: Collection Json
**Author:** Aaron Klump  <sourcecode@intheloftstudios.com>

##Summary
**Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at massa sed nulla consectetur malesuada.**

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at massa sed nulla consectetur malesuada. Aliquam a sapien non sem rhoncus bibendum quis eu tellus. Nunc luctus fermentum volutpat. Praesent tortor diam, sodales ornare facilisis sit amet, consequat nec elit. Aenean at porttitor purus.

You may also visit the [project page](http://www.drupal.org/project/collection_json) on Drupal.org.

##Requirements

##Installation
1. Install as usual, see [http://drupal.org/node/70151](http://drupal.org/node/70151) for further information.

##Configuration
1. If another module is providing the collection_json classes you need to add something like this to that file.

        /**
         * Implements hook_collection_json_config().
         */
        function MY_MODULE_collection_json_config_alter($config) {
          $config->autoload = FALSE;
        }

##Suggested Use

These are helpful functions to know

### Collection objects
You'll want to use this because it will construct an object using the current URL as the collection's href.

    collection_json_new_collection()

### Entity-based Collections
If your collection is based on an array of entities you may pass the ids to this function.

    collection_json_entity_collection()

### Entities as Items
Use these two functions to add an entity to a collection as an item.  Use the latter to fine tune the format.

    collection_json_entity_item()
    hook_collection_json_entity_item_alter()

### Bundle-based Template
Use these functions to add an bundle type template to a collection; again, the latter to tweak the format.

    collection_json_bundle_template()
    hook_collection_json_bundle_template_alter()

## Design Decisions/Rationale

##Contact
* **In the Loft Studios**
* Aaron Klump - Developer
* PO Box 29294 Bellingham, WA 98228-1294
* _aim_: theloft101
* _skype_: intheloftstudios
* _d.o_: aklump
* <http://www.InTheLoftStudios.com>