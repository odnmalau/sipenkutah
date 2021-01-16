<?php

use Modules\Narapidana\Controllers\NarapidanaController;

Route::group(
    [
        'prefix' => config('modules.narapidana.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.narapidana.route.middleware'),
    ],
    function () {
        Route::resource('narapidana', NarapidanaController::class);
    }
);
