<?php

use App\Http\Controllers\Api\V1\TenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('tenders')->controller(TenderController::class)->group(function(){
        Route::get('/','index');
        Route::post('/','store');
        Route::get('/{tender}','show')->whereNumber('tender');
        Route::post('/uploadCsv', 'uploadCsv');
    });
});
