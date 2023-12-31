<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\API;

// class for configuring the API settings
class SettingsAPI {

    public $fields = [];
    public $sections = [];
    public $settings = [];
    public $admin_pages = [];
    public $admin_subpages = [];

    public function register() {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }

        if (!empty($this->settings)) {
            add_action('admin_init', array($this, 'registerCustomFields'));
        }
    }

    public function addPages(array $pages) {
        $this->admin_pages = $pages;
        return $this;
    }

    public function addSubpages(array $pages) {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);
        return $this;

    }

    public function withSubpage(string $title = null) {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];
        $subpage = [
            [
                'parent_slug' => $admin_page['menu_slug'],
                'page_title'  => $admin_page['page_title'], 
                'menu_title'  => ($title) ? $title : $admin_page['menu_title'], 
                'capability'  => $admin_page['capability'], 
                'menu_slug'   => $admin_page['menu_slug'], 
                'callback'    => $admin_page['callback']
            ]
        ];

        $this->admin_subpages = $subpage;

        return $this;
    }

    public function addAdminMenu() {
        foreach($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }

        foreach($this->admin_subpages as $subpage) {
            add_submenu_page(
                $subpage['parent_slug'],
                $subpage['page_title'],
                $subpage['menu_title'],
                $subpage['capability'],
                $subpage['menu_slug'],
                $subpage['callback']
            );
        }
    }

    public function setSettings(array $settings) {
        $this->settings = $settings;
        return $this;
    }

    public function setSections(array $sections) {
        $this->sections = $sections;
        return $this;
    }

    public function setFields(array $fields) {
        $this->fields = $fields;
        return $this;
    }

    public function registerCustomFields() {
        // register settings
        foreach($this->settings as $setting) {
            register_setting(
                $setting['option_group'], 
                $setting['option_name'], 
                (isset($setting['callback']) ? $setting['callback'] : '')
            );
        }

        // add setting section
        foreach($this->sections as $section) {
            add_settings_section(
                $section['id'], 
                $section['title'], 
                (isset($section['callback']) ? $section['callback'] : ''), 
                $section['page']
            );
        }
        
        // add setting field
        foreach($this->fields as $field) {
            add_settings_field(
                $field['id'], 
                $field['title'], 
                (isset($field['callback']) ? $field['callback'] : ''), 
                $field['page'], 
                $field['section'], 
                (isset($field['args']) ? $field['args'] : '')
            );
        }
    }
}