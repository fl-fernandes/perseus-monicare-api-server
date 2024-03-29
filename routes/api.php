<?php

use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthcareProfessionalController;
use App\Http\Controllers\MeasurementTypeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientMeasurementController;
use App\Http\Controllers\UserController;
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

Route::group([
	'prefix' => 'auth',
	'namespace' => 'App\Http\Controllers',
], function () {
	Route::post('login', 'AuthController@login');
	Route::post('logout', 'AuthController@logout');
	Route::post('refresh', 'AuthController@refresh');
	Route::post('me', 'AuthController@me');
});

Route::group([
	'middleware' => ['apiJwt'],
], function () {
	Route::apiResource('users', UserController::class);
	Route::apiResource('healthcare-professionals', HealthcareProfessionalController::class, ['except' => ['store']]);
	Route::apiResource('doctors', DoctorController::class, ['except' => ['store']]);
	Route::apiResource('patients', PatientController::class, ['except' => ['store']]);
	Route::apiResource('caregivers', CaregiverController::class, ['except' => ['store']]);
	Route::apiResource('measurement-types', MeasurementTypeController::class);
	Route::apiResource(
		'patient-measurements/{patient_id}', 
		PatientMeasurementController::class,
		['parameters' => ['{patient_id}' => 'patient_measurement_id']]
	);
});

Route::group([
	'namespace' => 'App\Http\Controllers',
], function () {
	Route::post('healthcare-professionals', 'HealthcareProfessionalController@store');
	Route::post('doctors', 'DoctorController@store');
	Route::post('patients', 'PatientController@store');
	Route::post('caregivers', 'CaregiverController@store');
});