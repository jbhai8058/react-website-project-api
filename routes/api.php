<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
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

/*
|
|  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
|      return $request->user();
|
|   });
|
*/

// chart Route

Route::get('/chartdata',[ChartController::class, 'onAllSelect']);

// Client Review Route

Route::get('/clientreview',[ClientReviewController::class, 'onAllSelect']);

// Contact Form Route

Route::post('/contactsend',[ContactController::class, 'onContactSend']);

// Footer Route

Route::get('/footerdata',[FooterController::class, 'onSelectAll']);

// Information Route

Route::get('/information',[InformationController::class, 'onSelectAll']);

// Service Route

Route::get('/services',[ServiceController::class, 'ServiceView']);

// Course All Route

Route::get('/coursehome',[CoursesController::class, 'onSelectFour']);
Route::get('/courseall',[CoursesController::class, 'onSelectAll']);
Route::post('/coursedetails',[CoursesController::class, 'onSelectDetails']);

// Project All Route

Route::get('/projecthome',[ProjectController::class, 'onSelectThree']);
Route::get('/projectall',[ProjectController::class, 'onSelectAll']);
Route::get('/projectdetails/{projectId}',[ProjectController::class, 'ProjectDetails']);

// Home Etc All Route

Route::get('/home/video',[HomePageEtcController::class, 'SelectVideo']);
Route::get('/totalhome',[HomePageEtcController::class, 'SelectTotalHome']);
Route::get('/techhome',[HomePageEtcController::class, 'SelectTechHome']);
Route::get('/homepage/title',[HomePageEtcController::class, 'SelectHomeTitle']);

