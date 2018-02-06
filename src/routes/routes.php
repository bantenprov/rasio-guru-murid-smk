<?php

Route::group(['prefix' => 'rasio-guru-murid-smk', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@index',
        'create'     => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@create',
        'store'     => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@store',
        'show'      => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@show',
        'update'    => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@update',
        'destroy'   => 'Bantenprov\RasioGMSMK\Http\Controllers\RasioGMSMKController@destroy',
    ];

    Route::get('/',$controllers->index)->name('rasio-guru-murid-smk.index');
    Route::get('/create',$controllers->create)->name('rasio-guru-murid-smk.create');
    Route::post('/store',$controllers->store)->name('rasio-guru-murid-smk.store');
    Route::get('/{id}',$controllers->show)->name('rasio-guru-murid-smk.show');
    Route::put('/{id}/update',$controllers->update)->name('rasio-guru-murid-smk.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('rasio-guru-murid-smk.destroy');

});

