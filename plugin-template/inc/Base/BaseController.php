<?php
/**
* @package PluginTemplate
*/

// set the namespace
namespace Inc\Base;

// class for defining public accessible variables and initiales them
class BaseController {

    public $pluginURL;
    public $pluginPath;
    public $pluginName;

    function __construct() {
        $this->pluginURL  = plugin_dir_url(dirname(__FILE__, 2));
        $this->pluginPath = plugin_dir_path(dirname(__FILE__, 2));
        $plugin = plugin_basename(dirname( __FILE__, 3));
        $this->pluginName = $plugin . "/" . $plugin . ".php";
    }
}