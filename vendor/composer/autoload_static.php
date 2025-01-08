<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8660149018f385cc9d2eda256df57545
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8660149018f385cc9d2eda256df57545::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8660149018f385cc9d2eda256df57545::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8660149018f385cc9d2eda256df57545::$classMap;

        }, null, ClassLoader::class);
    }
}
