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

Route::get('/welcome/{name}', function( string $name){
    return "Добро пожаловать на сайт, {$name}";
});

Route::get('/about', function(){
    $data = date("Y")-1982;
    return "<h1>О компании</h1> <p>Мы работаем более {$data} лет на рынке новостей</p>";
});

Route::get('/news', function(){
    $date = date("Y-m-d H:i:s");
    return "Новости сегодня, {$date}";
});

Route::get('/news/{id}', function(string $id){
    return "Новость № {$id}";
});
