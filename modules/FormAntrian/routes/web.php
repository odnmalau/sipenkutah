<?php

use Modules\FormAntrian\Controllers\FormAntrianController;

Route::group(
    [
        'prefix' => config('modules.form-antrian.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.form-antrian.route.middleware'),
    ],
    function () {
        Route::resource('form-antrian', FormAntrianController::class);
        Route::get('/status-changes', [FormAntrianController::class, 'statusChanges'])->name('statusChanges');
    }
);
