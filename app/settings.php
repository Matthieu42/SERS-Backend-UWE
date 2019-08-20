<?php
return [
    'settings' => [
        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/log/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' => __DIR__ . '/cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'dbname'   => 'SERS',
                'user'     => 'root',
                'password' => 'root',
            ]
        ]
    ],
];
