<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcbb47eb2270c564b060483def162678
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcbb47eb2270c564b060483def162678::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcbb47eb2270c564b060483def162678::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcbb47eb2270c564b060483def162678::$classMap;

        }, null, ClassLoader::class);
    }
}
