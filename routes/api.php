<?php

use App\Models\Category;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('terms', TermController::class, [
    'except' => ['show', 'update']
]);

Route::get('categories', function () {
    $categories = Category::all();
    return response()->json([
        'success' => true,
        'data' => $categories
    ]);
});

Route::apiResource('blogs', BlogController::class);
