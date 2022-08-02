<?php

Route::group([
        'prefix'     => 'helloworld',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'ACME\HelloWorld\Http\Controllers\Shop\HelloWorldController@index')->defaults('_config', [
            'view' => 'helloworld::shop.index',
        ])->name('shop.helloworld.index');

});