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

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages($this->pages)->withSubpage('Dashboard')->
            addSubpages($this->subpages)->register();
    }

    public function setPages() {
        $this->pages =  [
            [
                'page_title' => 'Plugin Template', 
                'menu_title' => 'Plugin Template', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'plugin-template', 
                'callback'   => array($this->callbacks, 'adminDashboard'),
                'icon_url'   => 'dashicons-store',
                'position'   => 110
            ]
        ];
    }

    public function setSubpages() {
        $this->subpages =  [
            [
                'parent_slug' => 'plugin-template',
                'page_title'  => 'Plugin Template Test 1', 
                'menu_title'  => 'Test 1', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'plugin-template-test1', 
                'callback'    => array($this->callbacks, 'testOne')
            ],
            [
                'parent_slug' => 'plugin-template',
                'page_title'  => 'Plugin Template Test 2', 
                'menu_title'  => 'Test 2', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'plugin-template-test2', 
                'callback'    => array($this->callbacks, 'testTwo')
            ],
            [
                'parent_slug' => 'plugin-template',
                'page_title'  => 'Plugin Template Test3', 
                'menu_title'  => 'Test3', 
                'capability'  => 'manage_options', 
                'menu_slug'   => 'plugin-template-test3', 
                'callback'    => array($this->callbacks, 'testThree')
            ]
        ];
    }

    public function setSettings() {
        $args = [
            [
                'option_group' => 'template_options_group',
                'option_name'  => 'text_example',
                'callback'     => array($this->callbacks, 'templateOptionsGroup')
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function setSections() {
        $args = [
            [
                'id'       => 'template_admin_index',
                'title'    => 'Settings',
                'callback' => array($this->callbacks, 'templateAdminSection'),
                'page'     => 'plugin-template'
            ]
        ];

        $this->settings->setSections($args);
    }

    public function setFields() {
        $args = [
            [
                'id'       => 'text_example',
                'title'    => 'Text Example',
                'callback' => array($this->callbacks, 'templateTextExample'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'text_example',
                    'class'     => 'example-class'
                )
            ]
        ];

        $this->settings->setFields($args);
    }

}