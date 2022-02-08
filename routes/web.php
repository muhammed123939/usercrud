<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
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
    return view('backend.master');
});
Route::get('/user/vue', function () {
    return view('user.vue');
});
Route::get('/user/showcreate',[usercontroller::class,'showcreate']);
Route::post('/user/create',[usercontroller::class,'create']);
Route::get('/user',[usercontroller::class,'read']);
Route::post('/user/delete',[usercontroller::class,'delete']);
Route::get('/user/edit/{id}',[usercontroller::class,'edit1']);
Route::get('/user/getdata',[usercontroller::class,'readvue']);
Route::post('/user/edit',[usercontroller::class,'edit']);


