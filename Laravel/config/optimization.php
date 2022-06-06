<?php

return [
    'cache_driver' => [
        'file' => 'File (Default)',
        'array' => 'None',
        'database' => 'Database',
        'apc' => 'APC',
        'memcached' => 'Memcached',
        'redis' => 'Redis',
    ],
    'redis_client' => [
        'Predis' => 'predis',
        'PhpRedis' => 'phpredis'
    ],
    'redis_cluster' => [
        'Predis' => 'predis',
        'PhpRedis' => 'phpredis'
    ],
];
