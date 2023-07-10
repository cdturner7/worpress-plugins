<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController {

    public function checkboxSanitize($input) {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }

    public function templateAdminSection() {
        echo 'Manage the section and features of this plugin 
            by activating the checkboxes from the following list.';
    }

    public function checkboxField($args) {
        $name     = $args['label_for'];
        $classes  = $args['class'];
        $checkbox = get_option($name);
        echo '<input type="checkbox" name="'. $name .'" class="'. $classes .'" 
             value="1" '. ($checkbox ? 'checked':'') .'>';
    }

}