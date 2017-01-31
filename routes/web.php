<?php

Route::group(['middleware' => 'language'], function(){
    Route::get('language-switcher','LanguageSwitcher@index');
    Route::post('changeLanguage',array(
        'before' => 'csrf',
        'as' => 'language-switcher',
        'uses' => 'LanguageSwitcher@changeLanguage'
    ));
    Route::match(array('POST'), 'login','Login@index');
    Route::match(array('GET'), 'jquery-validate','TestController@jquery_validate');
    Route::match(array('GET'), 'frontend','TestController@frontend');

    Route::match(array('GET'), 'service-container','TestController@service_container');
    Route::match(array('GET'), 'cart','TestController@cart');
    Route::match(array('POST'), 'addToCart','TestController@addToCart');

});

Route::match(array('GET'), 'angular','Employees@angular');
Route::get('/api/v1/employees/{id?}', 'Employees@index');
Route::post('/api/v1/employees', 'Employees@store');
Route::post('/api/v1/employees/{id}', 'Employees@update');
Route::delete('/api/v1/employees/{id}', 'Employees@destroy');


