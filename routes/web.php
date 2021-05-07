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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('create','UserController@RegisterForm');

Route::post('insert','UserController@Register');

Route::post('login','UserController@Login');

Route::get('buy/{devicename}/{devicecost}/{username}','UserController@Transaction');


Route::get('return/{transactid}/{totalcost}/{count}','UserController@ReturnItem');

Route::get("pie", "UserController@UserGraph");

Route::get('loginform',function () {
    return view('login');
});

Route::get('admin', 'AdminController@ViewAllPurchases');





