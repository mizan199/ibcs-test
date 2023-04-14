<?php

use App\Http\API\EmployeeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employe.index');
Route::post('/employee/import', [EmployeeController::class, 'import'])->name('employe.import');
Route::post('/employee/pdf', [EmployeeController::class, 'pdfReport'])->name('employe.pdf');
