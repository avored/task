<?php





Route::middleware(['web','admin.auth'])
        ->namespace('AvoRed\Task\Http\Controllers')
        ->name('admin.')
        ->prefix('admin')
        ->group(function (){

                Route::resource('task','TaskController');

        });