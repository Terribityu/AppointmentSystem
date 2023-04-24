<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteaee36b4d66bce040177a634efafad62
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteaee36b4d66bce040177a634efafad62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteaee36b4d66bce040177a634efafad62::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteaee36b4d66bce040177a634efafad62::$classMap;

        }, null, ClassLoader::class);
    }
}
