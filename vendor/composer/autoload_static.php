<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit56df162d9dbf406978e118791385e46c
{
    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'ComposerAutoloaderInit56df162d9dbf406978e118791385e46c' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit56df162d9dbf406978e118791385e46c' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'Controllers\\Admin\\AdminController' => __DIR__ . '/../..' . '/Controllers/Admin/AdminController.php',
        'Controllers\\Admin\\CategoryController' => __DIR__ . '/../..' . '/Controllers/Admin/CategoryController.php',
        'Controllers\\AuthController' => __DIR__ . '/../..' . '/Controllers/AuthController.php',
        'Controllers\\CommentController' => __DIR__ . '/../..' . '/Controllers/CommentController.php',
        'Controllers\\IndexController' => __DIR__ . '/../..' . '/Controllers/IndexController.php',
        'Controllers\\PostController' => __DIR__ . '/../..' . '/Controllers/PostController.php',
        'Models\\Category' => __DIR__ . '/../..' . '/Models/Category.php',
        'Models\\Comment' => __DIR__ . '/../..' . '/Models/Comment.php',
        'Models\\Model' => __DIR__ . '/../..' . '/Models/Model.php',
        'Models\\Post' => __DIR__ . '/../..' . '/Models/Post.php',
        'Models\\User' => __DIR__ . '/../..' . '/Models/User.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Route' => __DIR__ . '/../..' . '/core/Route.php',
        'With' => __DIR__ . '/../..' . '/core/functions.php',
        'core\\Auth' => __DIR__ . '/../..' . '/core/Auth.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit56df162d9dbf406978e118791385e46c::$classMap;

        }, null, ClassLoader::class);
    }
}
