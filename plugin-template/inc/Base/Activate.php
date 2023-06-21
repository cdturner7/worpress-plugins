<?php
/**
* @package PluginTemplate
*/

// set the namespace
namespace Inc\Base;

// class for activating the plugin
class Activate {

    public static function activate() {
        flush_rewrite_rules();
    }
}