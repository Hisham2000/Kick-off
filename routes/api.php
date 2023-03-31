<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ClubsController;
use App\Http\Controllers\Api\RollesController;
use App\Http\Controllers\Api\ViewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [LoginController:: class, "login"]);
Route::post('register',[RegisterController::class, "register"]);
Route::get('roles', [RollesController::class, "gelAll"]);
Route::get('area', [AreaController::class, "getAll"]);
Route::get('clubs', [ClubsController::class, "getAll"]);
Route::get('clubs/admin/{id}', [AdminController::class, "getAdminClubs"]);
Route::get('clubs/{id}', [ClubsController::class, "getClub"]);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout', [LogoutController::class, "logout"]);
    Route::post('book', [BookController::class, "saveBook"]);
    Route::get('admin/requests/count', [BookController::class, "getNumberAdminRequest"]);
    Route::get('/admin/views/count', [ViewsController::class, 'countViews']);
    Route::get('admin/area/count', [AreaController::class, 'countAdminArea']);
    Route::get('admin/clubs/count', [ClubsController::class, 'countAdminClubs']);

    Route::get('admin/views/report', [ViewsController::class, 'viewsReport']);
});

