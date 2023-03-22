<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Webhooks\Processing\ProcessingSyncController;


Route::group(['prefix' => 'api/webhooks/processing', 'middleware' => 'processing_webhook'], function () {
    Route::post('transaction', [ProcessingSyncController::class, 'transaction'])->name('webhooks.transaction');
    Route::post('order', [ProcessingSyncController::class, 'order'])->name('webhooks.order');
    Route::post('orderItem', [ProcessingSyncController::class, 'orderItem'])->name('webhooks.orderItem');
});