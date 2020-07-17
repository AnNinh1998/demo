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
use App\TheLoai;
use App\Slide;
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','theloaiController@getDanhsach');
		
		Route::get('sua/{id}','theloaiController@getSua');
		Route::post('sua/{id}','theloaiController@postSua');

		Route::get('them','theloaiController@getThem');
		Route::post('them','theloaiController@postThem');

		Route::get('xoa/{id}','theloaiController@getXoa');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','slideController@getDanhsach');
		Route::get('sua','slideController@getSua');
		Route::get('them','slideController@getThem');
	});
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','loaitinController@getDanhsach');
		Route::get('sua','loaitinController@getSua');
		Route::get('them','loaitinController@getThem');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','tintucController@getDanhsach');
		Route::get('sua','tintucController@getSua');
		Route::get('them','tintucController@getThem');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','userController@getDanhsach');
		Route::get('sua','userController@getSua');
		Route::get('them','userController@getThem');
	});
});