<?php
/**
* @package ModularAdministrativeArea
*/

// set the namespace
namespace Inc;

// class for initializing all the other classes needed for the plugin
final class Init {
    
    // define a list of services
    public static $SERVICES = [
        // pages
        Pages\Admin::class,

        // base classes
        Base\Enqueue::class,
        Base\SettingLinks::class
    ];

    /**
     * Loop through the service classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services() {
        foreach(self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class     a class from the services array
     * @return class instance  a new instance of the class
     */
    private static function instantiate($class) {
        $service = new $class();
        return $service;
    }

    /**
     * gets the full list of service classes from global class list
     * @return array full list of service classes
     */
    public static function get_services() {
        return self::$SERVICES;
    }

}