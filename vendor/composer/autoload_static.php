<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7d803c75e83e994da114a71a62c176d8
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7d803c75e83e994da114a71a62c176d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7d803c75e83e994da114a71a62c176d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7d803c75e83e994da114a71a62c176d8::$classMap;

        }, null, ClassLoader::class);
    }
}
