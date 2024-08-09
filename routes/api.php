<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/trainers', \App\Http\Controllers\Main\Trainer\IndexController::class);
Route::get('/gym_info', \App\Http\Controllers\Main\GymInfo\IndexController::class);
Route::post('/contact_us', \App\Http\Controllers\Main\UsersContact\StoreController::class);


Route::post('/administrators', \App\Http\Controllers\Admin\Administrators\StoreController::class);

Route::namespace('App\Http\Controllers')->controller(AuthController::class)->middleware(['api'])->prefix('auth')
    ->group(function ($router) {
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
        Route::post('refresh', 'refresh');
        Route::post('me', 'me');

        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::get('/administrators', \App\Http\Controllers\Admin\Administrators\IndexController::class)->name('admin.administrators');
            Route::delete('/administrators/{id}', \App\Http\Controllers\Admin\Administrators\DeleteController::class)->name('administrators.delete');

            Route::delete('/admin/{id}', \App\Http\Controllers\Admin\UserContact\DeleteController::class)->name('users_contact.delete');
            Route::get('/admin', \App\Http\Controllers\Admin\UserContact\IndexController::class)->name('users_contact.main');

            Route::get('/trainers', \App\Http\Controllers\Admin\Trainer\IndexController::class);
            Route::post('/trainers', \App\Http\Controllers\Admin\Trainer\StoreController::class)->name('trainer.store');
            Route::delete('/trainers/{id}', \App\Http\Controllers\Admin\Trainer\DeleteController::class)->name('trainer.delete');
            Route::patch('/trainers/{trainer}', \App\Http\Controllers\Admin\Trainer\UpdateController::class);
            Route::get('/trainers/{id}', \App\Http\Controllers\Admin\Trainer\ShowController::class);

            Route::get('/gym_info', \App\Http\Controllers\Admin\GymInfo\IndexController::class);
            Route::post('/gym_info', \App\Http\Controllers\Admin\GymInfo\StoreController::class);
            Route::delete('/gym_info/{id}', \App\Http\Controllers\Admin\GymInfo\DeleteController::class)->name('gymInfo.store');
            Route::patch('/gym_info/{id}', \App\Http\Controllers\Admin\GymInfo\UpdateController::class)->name('gymInfo.update');
            Route::get('/gym_info/{id}', \App\Http\Controllers\Admin\GymInfo\ShowController::class);
        });
    });
