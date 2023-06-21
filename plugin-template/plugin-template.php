<?php
/**
* @package PluginTemplate
*/

/*
Plugin Name: Plugin Template
Plugin URI: https://collindturner.com/
Description: A simple WordPress plugin template
Version: 1.0.0
Author: Collin Turner
Author URI: https://collindturner.com/
License: GPLv3
Text Domain: plugintemplate
*/

/*
plugin-template is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

plugin-template is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with plugin-template. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

// simple security check
if (!defined('ABSPATH')) {
    die;
}

// require once the Composer Autoload
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once(dirname(__FILE__).'/vendor/autoload.php');
}

/**
 * code that runs when the plugin is activated
 */
function activate_plugin_template() {
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_plugin_template');

/**
 * code that runs when the plugin is deactivated
 */ 
function deactivate_plugin_template() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_plugin_template');

/**
 * initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}