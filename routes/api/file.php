<?php
Route::get('file', 'FileController@index')->name('file.index');
Route::post('file', 'FileController@store')->name('file.store');
Route::put('file', 'FileController@push')->name('file.push');
Route::get('file/push', 'FileController@pushLast')->name('file.pushLast');
Route::delete('file/{id}', 'FileController@destroy')->name('file.destroy');
