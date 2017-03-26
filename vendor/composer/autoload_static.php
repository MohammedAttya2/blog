<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42465dad321418bd47c35c1fa5273fff
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Blog\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42465dad321418bd47c35c1fa5273fff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42465dad321418bd47c35c1fa5273fff::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}