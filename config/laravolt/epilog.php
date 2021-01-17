<?php

/*
 * Set specific configuration variables here
 */
return [
    'route' => [
        'enabled' => false,
        'middleware' => ['web', 'auth'],
        'prefix' => 'epilog',
    ],
    'view' => [
        'layout' => 'laravolt::layouts.app',
    ],
    'menu' => [
        'enabled' => false,
    ],
    'levels' => [
        'debug' => ['class' => 'grey'],
        'info' => ['class' => 'blue'],
        'notice' => ['class' => 'yellow'],
        'warning' => ['class' => 'orange'],
        'error' => ['class' => 'red'],
        'critical' => ['class' => 'black'],
        'alert' => ['class' => 'black'],
        'emergency' => ['class' => 'black'],
    ],
];
