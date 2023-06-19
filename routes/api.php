<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/autos", [AutoController::class, "Listar"]);
Route::post("/autos", [AutoController::class, "Guardar"]);
Route::get("/autos/{auto}", [AutoController::class, "ListarUno"]);
Route::put("/autos/{auto}", [AutoController::class, "Modificar"]);
Route::put("/autos/{auto}", [AutoController::class, "Eliminar"]);
