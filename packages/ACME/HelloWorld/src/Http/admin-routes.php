<?php

use ACME\HelloWorld\Contracts\HelloWorld;
use Illuminate\Support\Facades\Route;
use ACME\HelloWorld\Http\Controllers\Admin\HelloWorldController;
use ACME\HelloWorld\Http\Controllers\Admin\OneAdvertisementController;
use ACME\HelloWorld\Http\Controllers\Admin\TwoAdvertisementController;
use ACME\HelloWorld\Http\Controllers\Admin\ThreeAdvertisementController;
use ACME\HelloWorld\Http\Controllers\Admin\FourAdvertisementController;

Route::group([
        'prefix'        => 'admin/helloworld',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', [HelloWorldController::class, 'index'])->defaults('_config', [
            'view' => 'helloworld::admin.index',
        ])->name('helloworld.admin.index');


        Route::get('/one', [OneAdvertisementController::class, 'index'])->name('helloworld.admin.one-advertisement');
        Route::get('/add_one_image', [OneAdvertisementController::class, 'addImage'])->name('helloworld.admin.addimages.oneimages');
        Route::post('/add_one_image', [OneAdvertisementController::class, 'storeOneImage'])->name('helloworld.admin.addimages.storeOneImage');
        Route::get('/edit_one_image/{id}', [OneAdvertisementController::class, 'editImage'])->name('helloworld.admin.editimages.oneimages');
        Route::put('/edit_one_image/{id}', [OneAdvertisementController::class, 'updateImage'])->name('helloworld.admin.updateImage.oneimages');
        Route::get('/delete_one_image/{id}', [OneAdvertisementController::class, 'deleteImage'])->name('helloworld.admin.deleteImage.oneimages');

        Route::get('/two', [TwoAdvertisementController::class, 'index'])->name('helloworld.admin.two-advertisement');
        Route::get('/add_two_images', [TwoAdvertisementController::class, 'addImage'])->name('helloworld.admin.addimages.twoimages');
        Route::post('/add_two_images', [TwoAdvertisementController::class, 'storeTwoImage'])->name('helloworld.admin.addimages.storeTwoImage');
        Route::get('/edit_two_image/{id}', [TwoAdvertisementController::class, 'editImage'])->name('helloworld.admin.editimages.twoimages');
        Route::put('/edit_two_image/{id}', [TwoAdvertisementController::class, 'updateImage'])->name('helloworld.admin.updateImage.twoimages');
        Route::get('/delete_two_image/{id}', [TwoAdvertisementController::class, 'deleteImage'])->name('helloworld.admin.deleteImage.twoimages');


        Route::get('/three', [ThreeAdvertisementController::class, 'index'])->name('helloworld.admin.three-advertisement');
        Route::get('/add_three_images', [ThreeAdvertisementController::class, 'addImage'])->name('helloworld.admin.addimages.threeimages');
        Route::post('/add_three_images', [ThreeAdvertisementController::class, 'storeThreeImage'])->name('helloworld.admin.addimages.storeThreeImage');
        Route::get('/edit_three_image/{id}', [ThreeAdvertisementController::class, 'editImage'])->name('helloworld.admin.editimages.threeimages');
        Route::put('/edit_three_image/{id}', [ThreeAdvertisementController::class, 'updateImage'])->name('helloworld.admin.updateImage.threeimages');
        Route::get('/delete_three_image/{id}', [ThreeAdvertisementController::class, 'deleteImage'])->name('helloworld.admin.deleteImage.threeimages');


        Route::get('/four', [FourAdvertisementController::class, 'index'])->name('helloworld.admin.four-advertisement');
        Route::get('/add_four_images', [FourAdvertisementController::class, 'addImage'])->name('helloworld.admin.addimages.fourimages');
        Route::post('/add_four_images', [FourAdvertisementController::class, 'storeFourImage'])->name('helloworld.admin.addimages.storeFourImage');
        Route::get('/edit_four_image/{id}', [FourAdvertisementController::class, 'editImage'])->name('helloworld.admin.editimages.fourimages');
        Route::put('/edit_four_image/{id}', [FourAdvertisementController::class, 'updateImage'])->name('helloworld.admin.updateImage.fourimages'); 
        Route::get('/delete_four_image/{id}', [FourAdvertisementController::class, 'deleteImage'])->name('helloworld.admin.deleteImage.fourimages');


});
// Route::view('/admin/hello-world', 'helloworld::admin.index')->name('admin.helloworld.index');
