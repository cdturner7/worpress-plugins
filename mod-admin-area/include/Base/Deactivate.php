<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Include\Base;

// class for deactivating the plugin
class Deactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}