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
    return view('welcome');
});
Route::get('/home', 'ViewController@viewHome');
Route::get('/products', 'ViewController@ViewProducts');

Route::get('/add', 'ViewController@addProduct');
Route::post('/addProduct', "ViewController@insertProduct");
Route::get('/getProducts/{id}', "ViewController@getProducts");
Route::post('/deleteProduct', "ViewController@deleteProduct");
Route::post('/editProduct', "ViewController@editProduct");
// Route::post('/addProduct', "ViewController@addNewProduct");
Route::post('/submitpage', "ViewController@submitPage");
// Route::get('/page', "ViewController@viewPage");
Route::get('/getPageProducts/{id}', "ViewController@getPageProducts");
Route::get('/page/{id}', "ViewController@viewPage")->name('page');
