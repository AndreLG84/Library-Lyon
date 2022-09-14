<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbdb44338d394e3d44ed7c2d710dcf43c
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
    );

    public static $classMap = array (
        'Admin' => __DIR__ . '/../..' . '/classes/Admin.php',
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Author' => __DIR__ . '/../..' . '/classes/Author.php',
        'Book' => __DIR__ . '/../..' . '/classes/Book.php',
        'Booking' => __DIR__ . '/../..' . '/classes/Booking.php',
        'Booking_infos' => __DIR__ . '/../..' . '/classes/Booking_infos.php',
        'Category' => __DIR__ . '/../..' . '/classes/Category.php',
        'Classes' => __DIR__ . '/../..' . '/classes/Classes.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Controller' => __DIR__ . '/../..' . '/controllers/Controller.php',
        'ControllerAdmin' => __DIR__ . '/../..' . '/controllers/ControllerAdmin.php',
        'ControllerBook' => __DIR__ . '/../..' . '/controllers/ControllerBook.php',
        'ControllerBooking' => __DIR__ . '/../..' . '/controllers/ControllerBooking.php',
        'ControllerEvent' => __DIR__ . '/../..' . '/controllers/ControllerEvent.php',
        'ControllerLogin' => __DIR__ . '/../..' . '/controllers/ControllerLogin.php',
        'ControllerStock' => __DIR__ . '/../..' . '/controllers/ControllerStock.php',
        'ControllerUser' => __DIR__ . '/../..' . '/controllers/ControllerUser.php',
        'Copy' => __DIR__ . '/../..' . '/classes/Copy.php',
        'Language' => __DIR__ . '/../..' . '/classes/Language.php',
        'Model' => __DIR__ . '/../..' . '/models/Model.php',
        'ModelAdmin' => __DIR__ . '/../..' . '/models/ModelAdmin.php',
        'ModelBook' => __DIR__ . '/../..' . '/models/ModelBook.php',
        'ModelBooking' => __DIR__ . '/../..' . '/models/ModelBooking.php',
        'ModelLogin' => __DIR__ . '/../..' . '/models/ModelLogin.php',
        'ModelStock' => __DIR__ . '/../..' . '/models/ModelStock.php',
        'ModelUser' => __DIR__ . '/../..' . '/models/ModelUser.php',
        'Pre_resa' => __DIR__ . '/../..' . '/classes/Pre_resa.php',
        'Publisher' => __DIR__ . '/../..' . '/classes/Publisher.php',
        'User' => __DIR__ . '/../..' . '/classes/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbdb44338d394e3d44ed7c2d710dcf43c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbdb44338d394e3d44ed7c2d710dcf43c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbdb44338d394e3d44ed7c2d710dcf43c::$classMap;

        }, null, ClassLoader::class);
    }
}
