<?php

/*
 * Set specific configuration variables here
 */
return [
    'route' => [
        'enabled' => false,
        'middleware' => ['web', 'auth'],
        'prefix' => 'database-monitor',
    ],
    'view' => [
        'layout' => 'laravolt::layouts.app',
    ],
    'menu' => [
        'enabled' => false,
    ],
    'disk' => env('DB_BACKUP_DISK', 'local-backup'),
];
