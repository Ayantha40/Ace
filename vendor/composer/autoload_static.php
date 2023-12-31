<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc497eb1b80c2db35783642ede5fbac28
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc497eb1b80c2db35783642ede5fbac28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc497eb1b80c2db35783642ede5fbac28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc497eb1b80c2db35783642ede5fbac28::$classMap;

        }, null, ClassLoader::class);
    }
}
