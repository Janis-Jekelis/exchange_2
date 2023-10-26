<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12800d5f21407b0281bdfe6e7a161a93
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit12800d5f21407b0281bdfe6e7a161a93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12800d5f21407b0281bdfe6e7a161a93::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit12800d5f21407b0281bdfe6e7a161a93::$classMap;

        }, null, ClassLoader::class);
    }
}
