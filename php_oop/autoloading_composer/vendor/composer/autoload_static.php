<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01311d2fd8bd6d036a2f531c4a090514
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Acme',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01311d2fd8bd6d036a2f531c4a090514::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01311d2fd8bd6d036a2f531c4a090514::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit01311d2fd8bd6d036a2f531c4a090514::$classMap;

        }, null, ClassLoader::class);
    }
}
