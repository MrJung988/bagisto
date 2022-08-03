<?php

Route::group([
        'prefix'     => 'coupon',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'ACME\Coupon\Http\Controllers\Shop\CouponController@index')->defaults('_config', [
            'view' => 'coupon::shop.index',
        ])->name('shop.coupon.index');

});