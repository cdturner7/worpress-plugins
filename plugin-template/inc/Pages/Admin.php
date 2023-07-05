<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\Pages;

use \Inc\API\SettingsAPI;
use \Inc\Base\BaseController;
use \Inc\API\Callbacks\AdminCallbacks;

// class for the plugin's admin page
class Admin extends BaseController {

    public $settings;
    public $callbacks;

    public $pages = [];
    public $subpages = [];
    
    public function register() {

        $this->settings = new SettingsAPI();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubpage('Dashboard')->
            addSubpages($this->subpages)->register();
    }

    public function setPages() {
        $this->pages =  [
            [
                'page_title' => 'Modular Administrative Area Settings', 
                'menu_title' => 'ModAdminArea', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'mod-admin-area', 
                'callback'   => array($this->callbacks, 'adminDashboard'),
                'icon_url'   => 'dashicons-store',
                'position'   => 110
            ]
        ];
    }

    public function setSubpages() {
        $this->subpages =  [
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test1', 
                'menu_title'  => 'Test1', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test1', 
                'callback'    => array($this->callbacks, 'testOne')
            ],
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test2', 
                'menu_title'  => 'Test2', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test2', 
                'callback'    => array($this->callbacks, 'testTwo')
            ],
            [
                'parent_slug' => 'mod-admin-area',
                'page_title'  => 'Modular Admin Area Test3', 
                'menu_title'  => 'Test3', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'mod-admin-test3', 
                'callback'    => array($this->callbacks, 'testThree')
            ]
        ];
    }
}