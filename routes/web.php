<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/{any}', 'App\Http\Controllers\IndexController')
    ->where('any', '^(?!admin).*')->name('main');

Route::get('/admin/{any?}', 'App\Http\Controllers\LoginController')
    ->where('any', '.*')->name('admin.main');



