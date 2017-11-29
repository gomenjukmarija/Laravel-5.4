<?php

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');