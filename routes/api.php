<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SoldBookController;
use App\Http\Controllers\LendBookController;
use App\Http\Controllers\RequestBookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register' , [AuthController::class, 'register']);
Route::post('/login' , [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']] , function (){

    Route::get('/user' , [AuthController::class, 'user']);

    Route::post('/addlibrary' , [LibraryController::class, 'addlibrary']);
    Route::get('/showlibrary' , [LibraryController::class, 'showlibrary']);
    Route::post('/editlibrary/{lib_id}' , [LibraryController::class, 'editlibrary']);
    Route::delete('/deletelibrary/{lib_id}' , [LibraryController::class, 'deletelibrary']);

    Route::post('/addcategori' , [CategoriController::class, 'addcatehori']);
    Route::get('/showcategori' , [CategoriController::class, 'showcategori']);
    Route::post('/editcategori/{cat_id}' , [CategoriController::class, 'editcategori']);
    Route::delete('/deletecategori/{cat_id}' , [CategoriController::class, 'deletecategori']);

    // books routes

    Route::post('/addbook' , [BookController::class, 'addbook']);
    Route::get('/showbook' , [BookController::class, 'showbook']);
    Route::post('/editbook/{book_id}' , [BookController::class, 'editbook']);
    Route::delete('/deletebook/{book_id}' , [BookController::class, 'deletebook']);


    Route::post('/addsoldbook' , [SoldBookController::class, 'addsoldbook']);
    Route::get('/showsoldbook' , [SoldBookController::class, 'showsoldbook']);
    Route::post('/editsoldbook/{sold_book_id}' , [SoldBookController::class, 'editsoldbook']);
    Route::delete('/deletebook/{sold_book_id}' , [SoldBookController::class, 'deletebook']);


    Route::post('/addlendingbook' , [LendBookController::class, 'addlendingbook']);
    Route::get('/showlendingbook' , [LendBookController::class, 'showlendingbook']);
    Route::post('/editlendingbook/{lending_id}' , [LendBookController::class, 'editlendingbook']);
    Route::delete('/deletelendingbook/{lending_id}' , [LendBookController::class, 'deletelendingbook']);


    Route::post('/addrequestbook' , [RequestBookController::class, 'addrequestbook']);
    Route::get('/shoqreuqestbook' , [RequestBookController::class, 'shoqreuqestbook']);
    
    Route::get('/seereuqestbook' , [RequestBookController::class, 'seereuqestbook']);







    Route::post('/logout' , [AuthController::class, 'logout']);

});
