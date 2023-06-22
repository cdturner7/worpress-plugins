<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Include\Base;

use \Include\Base\BaseController;

// class for enqueueing scripts for the plugin
class Enqueue extends BaseController {

    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style('style', $this->pluginURL.'assets/style.css');
        wp_enqueue_script('script', $this->pluginURL.'assets/script.js');
    }
}