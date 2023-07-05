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
    public $subpages = [];

    function __construct() {
        $this->settings = new SettingsAPI();

        $this->pages =  [
            [
                'page_title' => 'Modular Administrative Area Settings', 
                'menu_title' => 'ModAdminArea', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'mod-admin-area', 
                'callback'   => function() { 
                    echo '<h1>Modular Administrative Area Settings</h1>'; 
                },
                'icon_url'   => 'dashicons-store',
                'position'   => 110
            ]
        ];

        $this->subpages =  [
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test1', 
                'menu_title'  => 'Test1', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test1', 
                'callback'    => function() { echo '<h1>CPT Test1</h1>'; }
            ],
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test2', 
                'menu_title'  => 'Test2', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test2', 
                'callback'    => function() { echo '<h1>CPT Test2</h1>'; }
            ],
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test3', 
                'menu_title'  => 'Test3', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test3', 
                'callback'    => function() { echo '<h1>CPT Test3</h1>'; }
            ]
        ];
    }
    
    public function register() {
        $this->settings->addPages($this->pages)->withSubpage('Dashboard')->
            addSubpages($this->subpages)->register();
    }
}