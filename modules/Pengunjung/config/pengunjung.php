<?php

return [
    'route' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
        'prefix' => 'modules',
    ],
    'view' => [
        'layout' => 'laravolt::layouts.app',
    ],
    'menu' => [
        'enabled' => true,
    ],
    'permission' => ['manage-sipir', 'manage-pegawai', 'manage-narapidana', 'manage-pengunjung', 'manage-form-antrian'],
];
