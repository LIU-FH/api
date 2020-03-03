<?php
Route::get('doc', 'DocController@index')->name('doc.index');
Route::get('doc/{id}', 'DocController@show')->name('doc.show');
Route::post('doc', 'DocController@store')->name('doc.store');
Route::patch('doc/{id}', 'DocController@update')->name('doc.update');
Route::delete('doc/{id}', 'DocController@destroy')->name('doc.destroy');
