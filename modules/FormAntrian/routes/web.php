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
        Route::get('/status-changes-reject', [FormAntrianController::class, 'statusChangesReject'])->name('statusChangesReject');
        Route::get('/history', [FormAntrianController::class, 'history'])->name('form-antrian.history');
        Route::get('/history/pdf/{daterange}', [FormAntrianController::class, 'historyReportPdf'])->name('form-antrian.history.pdf');
    }
);
