<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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

    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/articles',[ArticleController::class, 'show']);
    Route::get('/articles',[ArticleController::class, 'index']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/articles',[ArticleController::class, 'store']);
    Route::put('/articles/{id}',[ArticleController::class, 'update']);
    Route::delete('/articles/{id}',[ArticleController::class, 'destroy']);

    Route::post('/logout',[AuthController::class, 'logout']);
});

//Route::resource('articles', ArticleController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
