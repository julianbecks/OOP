<?php

// settings.php

define('APP_ROOT', __DIR__);

return [
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,

        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,

            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '/var/doctrine',

            // you should add any other path containing annotated entity classes
            'metadata_dirs' => [APP_ROOT . '/Entities'],

            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 8080,
                'dbname' => 'Gaestebuch',
                'user' => 'Julian',
                'password' => 'julian',
                'charset' => 'utf-8'
            ]
        ]
    ]
];