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

Route::get('/', function () {
    //return view('welcome');
    View::addExtension('html', 'php');
    return View::make('index');
});

Route::any('{path?}', function()
{
    View::addExtension('html', 'php');
    return View::make('index');
})->where("path", ".+");
