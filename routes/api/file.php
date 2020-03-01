<?php
Route::get('file/{type}', 'FileController@index')->name('file.index');
Route::post('file', 'FileController@store')->name('file.store');
Route::delete('file/{id}', 'FileController@destroy')->name('file.destroy');
