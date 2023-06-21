<?php

use App\Http\Controllers\API\V1\AppointmentController;
use App\Http\Controllers\API\V1\DocumentController;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Support\Carbon;
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

Route::prefix('v1')->group(function () {
    Route::post('/appointments', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('/appointments/current', [AppointmentController::class, 'getCurrentAppointments'])->name('get-current-appointments');
});

Route::prefix('v2')->group(function () {
    // other v2 apis.
});
