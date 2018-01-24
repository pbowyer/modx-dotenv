<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7d12b7311af75db863a4ffa98e480f0d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'M1\\Env\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'M1\\Env\\' => 
        array (
            0 => __DIR__ . '/..' . '/m1/env/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7d12b7311af75db863a4ffa98e480f0d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7d12b7311af75db863a4ffa98e480f0d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
