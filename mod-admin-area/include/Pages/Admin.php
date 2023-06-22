<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Include\Pages;

use \Include\Base\BaseController;
use \Include\API\SettingsAPI;

// class for the plugin's admin page
class Admin extends BaseController {

    public $settings;

    public $pages = [];

    function __construct() {
        $this->settings = new SettingsAPI();

        $this->pages = [
            [
                'page_title' => 'Modular Administrative Area Settings', 
                'menu_title' => 'ModAdminArea', 
                'capability' => 'manage_options', 
                'menu_slug' => 'mod-admin-area', 
                'callback' => function() { 
                    echo '<h1>Modular Administrative Area Settings</h1>'; 
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];
    }
    
    public function register() {
        $this->settings->addPages($this->pages)->register();
    }
}