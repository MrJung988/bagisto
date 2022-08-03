<?php

Route::group([
        'prefix'     => 'testpackage',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'ACME\TestPackage\Http\Controllers\Shop\TestPackageController@index')->defaults('_config', [
            'view' => 'testpackage::shop.index',
        ])->name('shop.testpackage.index');

});