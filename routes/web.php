<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ChartController;
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

Route::get('/', [CrudController::class, "home"]);
Route::get('/detail/{id}', [CrudController::class, "detail"]);
Route::get('/chart', [ChartController::class, "chart"]);


//auth routes
Route::view("/register", "register_temp");
Route::post("/register", [UserController::class, 
	"register"]);

Route::view("/login", "login");
Route::post("/login", [UserController::class, 
	"login"]);
Route::get("/logout", function () {
	Session::forget("user");
	return redirect("/login");
});

//crud functions
Route::get("/crud", [CrudController::class, 
	"crud_list"]);
Route::view("/add", "add");
Route::post("/add", [CrudController::class, 
	"add"]);
Route::get("/delete/{id}", [CrudController::class,"delete"]);
Route::get("/edit/{id}", [CrudController::class,"edit"]);
Route::post("/update", [CrudController::class, 
	"update"]);