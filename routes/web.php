<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\JobsController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\JobGradesController;
use App\Http\Controllers\Backend\RegionsController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\DepartmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);

Route::post('login_post', [AuthController::class, 'login_post']);

// Admin || HR same name

Route::group(['middleware' => 'admin'], function(){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'edit_update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);

    // Job Start

    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'edit_update']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);

    //JOB HISTORY

    Route::get('admin/job_history', [JobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);
    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_update']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);
    
    // Job Grades

    Route::get('admin/job_grades', [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradesController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit_update']);
    Route::get('admin/job_grades/delete/{id}', [JobGradesController::class, 'delete']);

    //Regions
    Route::get('admin/regions', [RegionsController::class, 'index']);
    Route::get('admin/regions/add', [RegionsController::class, 'add']);
    Route::post('admin/regions/add', [RegionsController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}', [RegionsController::class, 'edit']);
    Route::post('admin/regions/edit/{id}', [RegionsController::class, 'edit_update']);
    Route::get('admin/regions/delete/{id}', [RegionsController::class, 'delete']);

    //Countries
    Route::get('admin/countries', [CountriesController::class, 'index']);
    Route::get('admin/countries/add', [CountriesController::class, 'add']);
    Route::post('admin/countries/add', [CountriesController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}', [CountriesController::class, 'edit']);
    Route::post('admin/countries/edit/{id}', [CountriesController::class, 'edit_update']);
    Route::get('admin/countries/delete/{id}', [CountriesController::class, 'delete']);
    Route::get('admin/countries_export', [CountriesController::class, 'countries_export']);

    //location
    Route::get('admin/location', [LocationController::class, 'index']);
    Route::get('admin/location/add', [LocationController::class, 'add']);
    Route::post('admin/location/add', [LocationController::class, 'add_post']);
    Route::get('admin/location/edit/{id}', [LocationController::class, 'edit']);
    Route::post('admin/location/edit/{id}', [LocationController::class, 'edit_update']);
    Route::get('admin/location/delete/{id}', [LocationController::class, 'delete']);
    Route::get('admin/location_export', [LocationController::class, 'location_export']);

    //department
    Route::get('admin/departments', [DepartmentController::class, 'index']);
    Route::get('admin/departments/add', [DepartmentController::class, 'add']);
    Route::post('admin/departments/add', [DepartmentController::class, 'add_post']);
    Route::get('admin/departments/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('admin/departments/edit/{id}', [DepartmentController::class, 'edit_update']);
    Route::get('admin/departments/delete/{id}', [DepartmentController::class, 'delete']);



});

Route::get('logout', [AuthController::class, 'logout']);