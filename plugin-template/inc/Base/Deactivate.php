<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\Base;

// class for deactivating the plugin
class Deactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}