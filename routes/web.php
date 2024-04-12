<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','role:superadmin|admin']],function(){
Route::resource('permission',PermissionController::class);
Route::resource('role',RoleController::class);
Route::get('role/{roleidalolaaa}/add/permission',[Rolecontroller::class,'addpermission'])
->name("role.addpermission");
Route::put('role/{roleid}/add/permission',[Rolecontroller::class,'updatepermission'])
->name("role.givepermission");
Route::resource('users',UserController::class);


});
