<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\WelcomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/back-office/{any}', [WelcomeController::class, 'home'])->where('any', '.*');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/job', [HomeController::class, 'indexJob'])->name('all_job');
Route::get('/job-details/{job_id}', [HomeController::class, 'jobDetails'])->name('job_details');

Route::get('/form', function () {
    return view('layouts.form');
});

Route::get('/back-office/admin', [DashboardController::class, 'index']);

Route::post('/candidature', [HomeController::class, 'Candidature'])->name('candidature');
Route::post('/client', [HomeController::class, 'Client'])->name('client');

Route::post('/demande', [ServiceController::class, 'demandeService'])->name('demande');

Route::post('/subscribe', [NewsletterController::class, 'subscribeToNewsletter'])->name('subscribe');


