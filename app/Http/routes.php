<?php

Route::get('/','HomeController@explore');
Route::get('/explore','HomeController@explore');
Route::get('/academy/create','AcademiesController@create')->middleware(['web']);
Route::post('/academy','AcademiesController@store');
Route::post('/academy/show','AcademiesController@show');
Route::get('/academy/showdetails/{id}','AcademiesController@index');
