<?php

return [
    'route' => [
        'enabled' => false,
        'middleware' => ['web', 'auth'],
        'prefix' => '',
    ],
    'view' => [
        'layout' => 'laravolt::layouts.app',
    ],
    'menu' => [
        'enabled' => false,
    ],
    'permission' => \Laravolt\Platform\Enums\Permission::MANAGE_LOOKUP,
    'collections' => [
        // Sample lookup collections
        'pekerjaan' => [
            'label' => 'Pekerjaan',
        ],
    ],
];
