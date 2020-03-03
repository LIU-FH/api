<?php
Route::get('sheatsheet', 'SheatsheetController@index')->name('sheatsheet.index');
Route::get('sheatsheet/{id}', 'SheatsheetController@show')->name('sheatsheet.show');
Route::post('sheatsheet', 'SheatsheetController@store')->name('sheatsheet.store');
Route::patch('sheatsheet/{id}', 'SheatsheetController@update')->name('sheatsheet.update');
Route::delete('sheatsheet/{id}', 'SheatsheetController@destroy')->name('sheatsheet.destroy');
