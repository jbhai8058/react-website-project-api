<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// chart Route

Route::get('/chartdata',[ChartController::class, 'onAllSelect']);

// Client Review Route

Route::get('/clientreview',[ClientReviewController::class, 'onAllSelect']);

// Contact Form Route

Route::post('/contactsend',[ContactController::class, 'onContactSend']);


