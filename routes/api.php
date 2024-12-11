<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Books\App\Controllers\DeleteBookController;
use Lightit\Backoffice\Books\App\Controllers\GetBookController;
use Lightit\Backoffice\Books\App\Controllers\ListBookController;
use Lightit\Backoffice\Books\App\Controllers\StoreBookController;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)->withTrashed();
        Route::post('/', StoreUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });


/*
|--------------------------------------------------------------------------
| Books Routes
|--------------------------------------------------------------------------
*/
Route::prefix('books')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListBookController::class);
        Route::get('/{book}', GetBookController::class)->withTrashed();
        Route::post('/', StoreBookController::class);
        Route::delete('/{book}', DeleteBookController::class);
    });
