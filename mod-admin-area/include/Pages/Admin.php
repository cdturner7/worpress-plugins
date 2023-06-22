<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Include\Pages;

use \Include\Base\BaseController;

// class for the plugin's admin page
class Admin extends BaseController {

    function register() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    function add_admin_pages() {
        add_menu_page(
            'Modular Administrative Area Settings', 
            'ModAdminArea', 
            'manage_options', 
            'mod-admin-area', 
            array($this, 'admin_index')
        );
    }

    function admin_index() {
        require_once $this->pluginPath.'templates/admin.php';
    }
    
}