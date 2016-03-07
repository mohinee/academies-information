<?php

Route::get('/','HomeController@index');
Route::get('/explore','HomeController@explore');
Route::get('/academy/create','AcademiesController@create')->middleware(['web']);
Route::post('/academy','AcademiesController@store');
Route::get('/academy/{academyid}','AcademiesController@show');