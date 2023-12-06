<?php

use App\Enums\Status;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
use App\Models\Patients;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (Request $request) {
    $outpatients = Visit::whereIn('status', [Status::active->value, Status::pending->value])->count();
    $admissions = DB::connection('global')->table('admissions')->count();
    $registrations = Patients::whereHas('insurance', function ($query) {
        $query->where('status', Status::pending->value);
    })->count();

    $visits = Visit::with(['patient'])->whereHas('patient', function ($query) {
        $query->has('insurance');
    })->paginate(20)->withQueryString();

    return view('dashboard', [
        'user' => $request->user(), 'outpatients' => $outpatients, 'admissions' => $admissions,
        'new_patients' => $registrations,
        'visits' => $visits,
    ]);
})->middleware(['auth:sanctum'])->name('dashboard');

Route::any('login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'auth:sanctum'])->group(function () {
    Route::prefix('patients')->group(function () {
        Route::get('/', [PatientsController::class, 'index'])->name('patients');
        Route::get('/{patient}', [PatientsController::class, 'show'])->name('patient');
    });

    Route::prefix('visits')->name('visits.')->group(function () {
        Route::get('/{visit}', [PatientsController::class, 'getPatientVisits'])->name('patient');
    });
});
