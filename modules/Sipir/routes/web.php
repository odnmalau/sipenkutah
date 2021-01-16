<?php

use Modules\Sipir\Controllers\SipirController;

Route::group(
    [
        'prefix' => config('modules.sipir.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.sipir.route.middleware'),
    ],
    function () {
        Route::resource('sipir', SipirController::class);
    }
);
