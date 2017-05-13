<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf155286662940e537ea1ecbf6a79b5ff
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Databases\\' => 10,
        ),
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Databases\\' => 
        array (
            0 => __DIR__ . '/../..' . '/databases',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Classes\\Config' => __DIR__ . '/../..' . '/classes/config.class.php',
        'Classes\\Silm' => __DIR__ . '/../..' . '/classes/silm.class.php',
        'Classes\\Silmto' => __DIR__ . '/../..' . '/classes/silmto.class.php',
        'Databases\\UsersTable' => __DIR__ . '/../..' . '/databases/create_users_table.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf155286662940e537ea1ecbf6a79b5ff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf155286662940e537ea1ecbf6a79b5ff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf155286662940e537ea1ecbf6a79b5ff::$classMap;

        }, null, ClassLoader::class);
    }
}
