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





Route::group(['prefix'=>'/'],function (){

    Route::get('/',[\App\Http\Controllers\frontController::class,'index'])->name("index");
    Route::get('/about',[\App\Http\Controllers\frontController::class,'about'])->name("about");
    Route::get('/commination',[\App\Http\Controllers\frontController::class,'commination'])->name("commination");
    Route::post('/commination',[\App\Http\Controllers\frontController::class,'sendMesage'])->name("comminationPost");
    Route::get('/category',[\App\Http\Controllers\frontController::class,'category'])->name("category.index");
    Route::get('/makaleler',[\App\Http\Controllers\frontController::class,'makaleler'])->name("makaleler");
    Route::get('/makaleler/{id}',[\App\Http\Controllers\frontController::class,'makaleler'])->name("makalelerGet");

    Route::get('/icerik/{id}',[\App\Http\Controllers\frontController::class,'icerik'])->name("icerik");


});

Route::get("/register",[\App\Http\Controllers\adminController::class,'register'])->name("register");

Route::group(['prefix'=>'panel','middleware'=>['auth:sanctum', 'verified']],function (){

    Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
        return redirect()->route("home");
    })->name('dashboard');

    Route::get('logout',[\App\Http\Controllers\adminController::class,'out'])->name("log");

    Route::get('/index',[\App\Http\Controllers\adminController::class,'index'])->name("home");
    Route::get('/category',[\App\Http\Controllers\adminController::class,'category'])->name("category");
    Route::post('/category',[\App\Http\Controllers\adminController::class,'createCategory'])->name("createCategory");
    Route::post('/categoryDelete',[\App\Http\Controllers\adminController::class,'deleteCategory'])->name("deleteCategory");
    Route::get('/updateGet',[\App\Http\Controllers\adminController::class,'getCategory'])->name("getCategory");
    Route::post('/updateCategory',[\App\Http\Controllers\adminController::class,'updateCategory'])->name("updateCategory");
    Route::get('/activeCategory',[\App\Http\Controllers\adminController::class,'active'])->name("activeCategory");

    Route::get('/post',[\App\Http\Controllers\postController::class,'post'])->name("post");
    Route::post('/post',[\App\Http\Controllers\postController::class,'createPost'])->name("createPost");
    Route::post('/postDelete',[\App\Http\Controllers\postController::class,'deletePost'])->name("deletePost");
    Route::get('/postUpdateGet',[\App\Http\Controllers\postController::class,'getPost'])->name("getPost");
    Route::post('/updatePost',[\App\Http\Controllers\postController::class,'updatePost'])->name("updatePost");
    Route::get('/activePost',[\App\Http\Controllers\postController::class,'active'])->name("activePost");

    Route::get('/aboutPanel',[\App\Http\Controllers\adminController::class,"indexAbout"])->name("aboutPanel");
    Route::post('/about',[\App\Http\Controllers\adminController::class,"aboutUpdate"])->name("aboutUpdate");

    Route::get('/iletisim',[\App\Http\Controllers\iletisimController::class,"iletisimIndex"])->name("iletisim.index");
    Route::get('/iletisimGet',[\App\Http\Controllers\iletisimController::class,"getContent"])->name("iletisim.content");
    Route::post('/iletisimDelete',[\App\Http\Controllers\iletisimController::class,"deleteIletisim"])->name("iletisim.delete");
    Route::get('/fetch', [\App\Http\Controllers\iletisimController::class, "fetch"])->name('iletisim.fetch');

});
