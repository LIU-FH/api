<?php
Route::get('collector', 'CollectorController@index')->name('collector.index');
Route::get('collector/{id}', 'CollectorController@show')->name('collector.show');
Route::post('collector', 'CollectorController@store')->name('collector.store');
Route::patch('collector/{id}', 'CollectorController@update')->name('collector.update');
Route::delete('collector/{id}', 'CollectorController@destroy')->name('collector.destroy');
