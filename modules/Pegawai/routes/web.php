<?php

use Modules\Pegawai\Controllers\PegawaiController;

Route::group(
    [
        'prefix' => config('modules.pegawai.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.pegawai.route.middleware'),
    ],
    function () {
        Route::resource('pegawai', PegawaiController::class);
    }
);
