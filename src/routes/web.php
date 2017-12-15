<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:59
 */

use Illuminate\Support\Facades\Route;
use Dionyseos\JsonMenu\HTTP\Controllers\JsonMenuController;

Route::middleware(config('jsonmenu.middleware.auth', 'auth'))
    ->prefix('/services/jsonmenu/v1/')->get('{menu}', JsonMenuController::class . '@get')->name('jsonmenu.get');

Route::middleware(config('jsonmenu.middleware.auth', 'auth'))
    ->prefix('/services/jsonmenu/v1/')->post('{menu}',  JsonMenuController::class .'@save')->name('jsonmenu.save');

Route::middleware(config('jsonmenu.middleware.auth', 'auth'))
    ->prefix('/services/jsonmenu/v1/')->delete('{menu}',  JsonMenuController::class .'@delete')->name('jsonmenu.delete');