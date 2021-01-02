<?php

use App\Http\Controllers\Api\VerificationCodesController;
use App\Http\Middleware\AcceptHeader;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
    ->namespace('Api/V1')
    ->name('api.v1.')
    ->middleware([AcceptHeader::class])
    ->group(function () {
        Route::post('verificationCodes', [VerificationCodesController::class, 'store'])->name('verificationCodes.store');
    });
