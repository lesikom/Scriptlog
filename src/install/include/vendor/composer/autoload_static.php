<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65d8d43f7e5871d489681098837a6b70
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sinergi\\BrowserDetector\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sinergi\\BrowserDetector\\' => 
        array (
            0 => __DIR__ . '/..' . '/sinergi/browser-detector/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit65d8d43f7e5871d489681098837a6b70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit65d8d43f7e5871d489681098837a6b70::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
