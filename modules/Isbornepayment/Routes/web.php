<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'Modules\Isbornepayment\Http\Controllers'
], function () {
    Route::prefix('isbornepayment')->group(function() {
        Route::get('/execute/{order}', 'Main@onSiteBorneCheckout')->name('isbornepayment.onsitecheckout');
        Route::get('/success/{ordermd}', 'Main@success')->name('isbornepayment.success');
        Route::get('/cancel/{ordermd}', 'Main@cancel')->name('isbornepayment.cancel');
    });
});

