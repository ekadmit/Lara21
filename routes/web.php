<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use \App\Http\Controllers\ContactController;
use App\Http\Controllers\ExportSourceController;
use App\Http\Controllers\Admin\ExportController as AdminExportController;
use App\Http\Controllers\Account\IndexController as AccountController;

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


Route::get('/', [HomePageController::class, 'index']);

//роут для формы обратной связи
Route::group([ 'prefix' => 'feedback'], function() {
    Route::get('/', [ContactController::class, 'index'])->name('feedback');
    Route::post('/store', [ContactController::class, 'store'])->name('feedback.store');
});

//роут для выгрузки
Route::group([ 'prefix' => 'export'], function() {
    Route::get('/', [ExportSourceController::class, 'index'])->name('export');
    Route::post('/store', [ExportSourceController::class, 'store'])->name('export.store');
});

//объединяем в группу то, что касается новостей на стороне пользователя
Route::group([ 'prefix' => 'news'], function() {
    Route::get('/', [NewsController::class, 'index'])
    -> name('news');
    Route::get('/show/{news}', [NewsController::class, 'show']) -> where('news', '\d+')
    -> name('news.show');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('account', AccountController::class)->name('account');
    Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('export', AdminExportController::class);
    });
}
);


//объединяем в группу категории
Route::group(['prefix'=>'category'], function(){
    Route::get('/', [CategoryController::class, 'index']) -> name('category');
    Route::get('/show/{category}', [CategoryController::class, 'show']) -> where('id', '\d+')
    -> name('category.show');
});


Route::get('collection', function(){

    //установить сессию
//    session(['new_session' =>1]);
//    session()->put('key', 'value');

    //проверяем, установлена ли сессия
//    if(session()->has('new_session')){
//        dd(session()->all()); // вывести все сессии
//    }
//
    //удалить сессию
//    session()->forget('new_session');


    $collect = collect([
       ['name'=> 'Anna', 'age' => 20, 'work' => 'IT'],
       ['name'=> 'Joe', 'age' => 30, 'work' => 'Economy'],
       ['name'=> 'Dany', 'age' => 32, 'work' => 'Marketing'],
       ['name'=> 'Alice', 'age' => 60, 'work' => 'IT'],
    ]);
    dd(
//        $collect->map(fn($people) => $people['name'])
        $collect->max(fn($people) => $people['age'])
    );

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
