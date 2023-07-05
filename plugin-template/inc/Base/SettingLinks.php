<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\Base;

use \Inc\Base\BaseController;

// class for adding settings links to plugin
class SettingLinks extends BaseController {

    function register() {
        add_filter('plugin_action_links_'.$this->pluginName, array($this, 'add_settings_link'));
    }

    function add_settings_link($links) {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=mod-admin-area">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}