<?php

Route::get('/', 'AssistantController@index');

Route::post('/update', 'UpdateController@update');