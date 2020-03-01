<?php
Route::get('article', 'ArticleController@index')->name('article.index');
Route::get('article/{id}', 'ArticleController@show')->name('article.show');
Route::post('article', 'ArticleController@store')->name('article.store');
Route::patch('article/{id}', 'ArticleController@update')->name('article.update');
Route::delete('article/{id}', 'ArticleController@destroy')->name('article.destroy');
