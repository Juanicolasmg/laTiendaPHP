<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Primera ruta
//Clase Route -> metodo get -> colbag (Que hara cuando invoque la ruta)
Route::get('home', function(){ 
    echo "Le dijo la araña a la mosca";
});
