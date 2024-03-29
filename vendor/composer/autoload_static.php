<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc42ec4eb3ddc4feed3d841a0f2237669
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FoxyMVC\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FoxyMVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc42ec4eb3ddc4feed3d841a0f2237669::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc42ec4eb3ddc4feed3d841a0f2237669::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc42ec4eb3ddc4feed3d841a0f2237669::$classMap;

        }, null, ClassLoader::class);
    }
}
