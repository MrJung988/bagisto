<?php

Route::group([
        'prefix'        => 'admin/coupon',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'ACME\Coupon\Http\Controllers\Admin\CouponController@index')->defaults('_config', [
            'view' => 'coupon::admin.index',
        ])->name('admin.coupon.index');

});