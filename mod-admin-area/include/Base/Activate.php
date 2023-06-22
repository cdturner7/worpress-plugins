<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Include\Base;

// class for activating the plugin
class Activate {

    public static function activate() {
        flush_rewrite_rules();
    }
}