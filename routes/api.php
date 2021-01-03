<?php

use App\Http\Controllers\Api\AuthorizationsController;
use App\Http\Controllers\Api\VerificationCodesController;
use App\Http\Controllers\UsersController;
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
    ->namespace('Api')
    ->name('api.v1.')
    ->middleware([AcceptHeader::class])
    ->group(function () {
        Route::post('verificationCodes', [VerificationCodesController::class, 'store'])
            ->name('verificationCodes.store');
        // 用户注册
        Route::post('users', [UsersController::class, 'store'])
            ->name('users.store');
        // 第三方登录
        Route::post('socials/{social_type}/authorizations', [AuthorizationsController::class, 'socialStore'])
            ->where('social_type', 'wechat')
            ->name('socials.authorizations.store');
        // 登录
        Route::post('authorizations', [AuthorizationsController::class, 'store'])
            ->name('authorizations.store');
        // 刷新token
        Route::put('authorizations/current', [AuthorizationsController::class, 'update'])
            ->name('authorizations.update');
        // 删除token
        Route::delete('authorizations/current', [AuthorizationsController::class, 'destroy'])
            ->name('authorizations.destroy');
    });
