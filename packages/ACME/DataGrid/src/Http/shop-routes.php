<?php

Route::group([
        'prefix'     => 'datagrid',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'ACME\DataGrid\Http\Controllers\Shop\DataGridController@index')->defaults('_config', [
            'view' => 'datagrid::shop.index',
        ])->name('shop.datagrid.index');

});