<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/public/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('filename', '.*');

Route::post('/login', [AdminController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    // admin
    Route::get('/get-role', [AdminController::class, 'getRole']);
    Route::post('/add-admin', [AdminController::class, 'createAdmin']);
    Route::post('/edit-admin', [AdminController::class, 'editAdmin']);
    Route::get('/get-admin', [AdminController::class, 'indexAdmin']);
    Route::get('/get-one-admin', [AdminController::class, 'getAdmin']);
    Route::delete('/delete-admin', [AdminController::class, 'deleteAdmin']);
    Route::post('/logout', [AdminController::class, 'logout']);

    // permissions
    Route::get('/get-permissions', [AdminController::class, 'getAllPermissions']);
    Route::post('/add-permissions/{userId}/add', [AdminController::class, 'addPermission']);


    // service
    Route::post('/add-type-service', [ServiceController::class, 'createTypeService']);
    Route::post('/edit-type-service', [ServiceController::class, 'editTypeService']);
    Route::get('/get-type-service', [ServiceController::class, 'indexTypeService']);
    Route::get('/get-one-type-service', [ServiceController::class, 'getTypeService']);
    Route::delete('/delete-type-service', [ServiceController::class, 'deleteTypeService']);
    Route::post('/add-service', [ServiceController::class, 'createService']);
    Route::post('/edit-service', [ServiceController::class, 'editService']);
    Route::get('/get-service', [ServiceController::class, 'indexService']);
    Route::get('/get-one-service', [ServiceController::class, 'getService']);
    Route::delete('/delete-service', [ServiceController::class, 'deleteService']);
    Route::get('/get-demande', [ServiceController::class, 'indexClients']);
    Route::get('/get-all-service', [ServiceController::class, 'service']);

    // emploi
    Route::post('/add-categorie', [EmploiController::class, 'createCategory']);
    Route::post('/edit-categorie', [EmploiController::class, 'editCategory']);
    Route::get('/get-categorie', [EmploiController::class, 'indexCategories']);
    Route::get('/get-one-categorie', [EmploiController::class, 'getCategory']);
    Route::delete('/delete-categorie', [EmploiController::class, 'deleteCategory']);
    Route::post('/add-emploi', [EmploiController::class, 'createEmploi']);
    Route::post('/edit-emploi', [EmploiController::class, 'editEmploi']);
    Route::get('/get-emploi', [EmploiController::class, 'indexEmploi']);
    Route::get('/get-one-emploi', [EmploiController::class, 'getEmploi']);
    Route::delete('/delete-emploi', [EmploiController::class, 'deleteEmploi']);
    Route::get('/get-one-candidat', [EmploiController::class, 'getCandidat']);
    Route::get('/get-candidat', [EmploiController::class, 'indexCandidat']);
});