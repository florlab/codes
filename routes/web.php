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
});



