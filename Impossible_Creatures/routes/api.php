<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\AnimalController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* User */
Route::get('/users', [UserController::class, 'getAll']);
Route::get('/users/{id}', [UserController::class, 'getByID']);
Route::post('/users', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);

/*Spacies*/
Route::post('/species', [SpecieController::class, 'create']);
Route::put('/species/{id}', [SpecieController::class, 'update']);
Route::delete('/species/{id}', [SpecieController::class, 'delete']);
Route::get('/species', [SpecieController::class, 'getAll']);


/*Animal*/
Route::post('/animals', [AnimalController::class, 'create']);
Route::put('/animals/{id}', [AnimalController::class, 'update']);
Route::delete('/animals/{id}', [AnimalController::class, 'delete']);
Route::get('/animals', [AnimalController::class, 'getAll']);
Route::get('/animals/{id}', [AnimalController::class, 'getbyID']);

/*Routes d'<affichage*/
Route::get('/users/{id}/animals', [AnimalController::class, 'getAnimals']);
Route::get('/users/{id}/species', [SpecieController::class, 'getSpecies']);
Route::get('/users/{id}/animal', [AnimalController::class, 'getOneAnimal']);
Route::get('/users/{points}', [AnimalController::class, 'getPoins']);
