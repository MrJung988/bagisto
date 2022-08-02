<?php

use Illuminate\Support\Facades\Route;
use ACME\HelloWorld\Http\Controllers\Admin\HelloWorldController;

/**
 * HelloWorld routes.
 */
Route::prefix('helloworld')->group(function(){
    /**
     * Items routes.
     */
    Route::get('/item1',[HelloWorldController::class,'index']);
});