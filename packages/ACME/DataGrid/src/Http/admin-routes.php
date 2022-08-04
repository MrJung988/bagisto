<?php

Route::group([
        'prefix'        => 'admin/datagrid',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'ACME\DataGrid\Http\Controllers\Admin\DataGridController@index')->defaults('_config', [
            'view' => 'datagrid::admin.index',
        ])->name('admin.datagrid.index');

});