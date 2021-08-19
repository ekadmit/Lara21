<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\ContactController;
use App\Http\Controllers\ExportSourceController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class, 'index']);

//роут для формы обратной связи
Route::group([ 'prefix' => 'feedback'], function() {
    Route::get('/', [ContactController::class, 'index'])->name('feedback');
    Route::get('/store', [ContactController::class, 'store'])->name('feedback.store');
});

//роут для выгрузки
Route::group([ 'prefix' => 'export'], function() {
    Route::get('/', [ExportSourceController::class, 'index'])->name('export');
    Route::get('/store', [ExportSourceController::class, 'store'])->name('export.store');
});

//объединяем в группу то, что касается новостей на стороне пользователя
Route::group([ 'prefix' => 'news'], function() {
    Route::get('/', [NewsController::class, 'index'])
    -> name('news');
    Route::get('/show/{id}', [NewsController::class, 'show']) -> where('id', '\d+')
    -> name('news.show');
});

//подключаем ресурс-контроллеры и группируем для админки
Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', IndexController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

//объединяем в группу категории
Route::group(['prefix'=>'category'], function(){
    Route::get('/', [CategoryController::class, 'index']) -> name('category');
    Route::get('/show/{id}', [CategoryController::class, 'show']) -> where('id', '\d+')
    -> name('category.show');
});




//
//Route::get('/hi/{name}', function( string $name){
//    return "Hello, {$name}";
//});
//
//Route::get('/welcome/{name}', function( string $name){
//    return "Добро пожаловать на сайт, {$name}";
//});
//
//Route::get('/about', function(){
//    $data = date("Y")-1982;
//    return "<h1>О компании</h1> <p>Мы работаем более {$data} лет на рынке новостей</p>";
//});
//
//Route::get('/news', function(){
//    $date = date("Y-m-d H:i:s");
//    return "Новости сегодня, {$date}";
//});
//
//Route::get('/news/{id}', function(string $id){
//    return "Новость № {$id}";
//});
