<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\Pages;

use \Inc\API\SettingsAPI;
use \Inc\Base\BaseController;
use \Inc\API\Callbacks\AdminCallbacks;
use \Inc\API\Callbacks\ManagerCallbacks;

// class for the plugin's admin page
class Admin extends BaseController {

    public $settings;
    public $callbacks;
    public $callbacksManager;

    public $pages = [];
    public $subpages = [];
    
    public function register() {

        $this->settings = new SettingsAPI();

        $this->callbacks = new AdminCallbacks();

        $this->callbacksManager = new ManagerCallbacks();

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
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'cpt_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'taxonomy_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'media_widget',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'gallery_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'testimonial_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'templates_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'login_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'membership_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ],
            [
                'option_group' => 'template_plugin_settings',
                'option_name'  => 'chat_manager',
                'callback'     => array($this->callbacksManager, 'checkboxSanitize')
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function setSections() {
        $args = [
            [
                'id'       => 'template_admin_index',
                'title'    => 'Settings Manager',
                'callback' => array($this->callbacksManager, 'templateAdminSection'),
                'page'     => 'plugin-template'
            ]
        ];

        $this->settings->setSections($args);
    }

    public function setFields() {
        $args = [
            [
                'id'       => 'cpt_manager',
                'title'    => 'Activate CPT Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'cpt_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'taxonomy_manager',
                'title'    => 'Activate Taxonomy Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'taxonomy_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'media_widget',
                'title'    => 'Activate Media Widget Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'media_widget',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'gallery_manager',
                'title'    => 'Activate Gallery Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'gallery_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'testimonial_manager',
                'title'    => 'Activate Testimonial Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'testimonial_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'templates_manager',
                'title'    => 'Activate Templates Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'templates_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'login_manager',
                'title'    => 'Activate Login Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'login_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'membership_manager',
                'title'    => 'Activate Membership Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'membership_manager',
                    'class'     => 'ui-toggle'
                )
            ],
            [
                'id'       => 'chat_manager',
                'title'    => 'Activate Chat Manager',
                'callback' => array($this->callbacksManager, 'checkboxField'),
                'page'     => 'plugin-template',
                'section'  => 'template_admin_index',
                'args'     => array(
                    'label_for' => 'chat_manager',
                    'class'     => 'ui-toggle'
                )
            ]
        ];

        $this->settings->setFields($args);
    }

}