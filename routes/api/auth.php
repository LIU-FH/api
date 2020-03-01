<?php
Route::prefix('auth')->group(function () {
    Route::post('logout', 'Auth\TokenController@logout')->name('token.logout');
    Route::post('refresh', 'Auth\TokenController@refresh')->name('token.refresh');
});

