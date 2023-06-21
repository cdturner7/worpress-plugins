<?php
/**
* @package PluginTemplate
*/

// set the namespace
namespace Inc\Pages;

use \Inc\Base\BaseController;

// class for the plugin's admin page
class Admin extends BaseController {

    function register() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    function add_admin_pages() {
        add_menu_page("Collin's Plugin Template", 'PluginTemplate', 'manage_options', 'plugin_template',
            array($this, 'admin_index'), '', 110);
    }

    function admin_index() {
        require_once $this->pluginPath.'templates/admin.php';
    }
    
}