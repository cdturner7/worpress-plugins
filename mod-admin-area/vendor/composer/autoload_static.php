<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit625f5edb569a040b8392cc3255cba89e
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Include\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Include\\' => 
        array (
            0 => __DIR__ . '/../..' . '/include',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit625f5edb569a040b8392cc3255cba89e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit625f5edb569a040b8392cc3255cba89e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit625f5edb569a040b8392cc3255cba89e::$classMap;

        }, null, ClassLoader::class);
    }
}