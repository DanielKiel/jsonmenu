<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:59
 */

use Illuminate\Support\Facades\Route;
use Dionyseos\JsonMenu\HTTP\Controllers\JsonMenuController;

Route::get('/service/jsonmenu/v1/{menu}', JsonMenuController::class . '@get')->name('jsonmenu.get');

Route::post('/service/jsonmenu/v1/{menu}',  JsonMenuController::class .'@save')->name('jsonmenu.save');

Route::delete('/service/jsonmenu/v1/{menu}',  JsonMenuController::class .'@delete')->name('jsonmenu.delete');