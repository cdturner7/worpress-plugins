<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController {

    public function adminDashboard() {
        return require_once("$this->pluginPath/templates/admin.php"); 
    }

    public function testOne() {
        return require_once("$this->pluginPath/templates/testone.php"); 
    }

    public function testTwo() {
        return require_once("$this->pluginPath/templates/testtwo.php"); 
    }

    public function testThree() {
        return require_once("$this->pluginPath/templates/testthree.php"); 
    }
}