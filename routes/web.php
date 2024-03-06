<?php

use App\Http\Controllers\ExcelComparisonController;
use App\Http\Controllers\ExcelCSVController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV']);
// Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV']);

Route::get('/excel-view', [ExcelComparisonController::class, 'index']);
Route::post('/compare-excel-data', [ExcelComparisonController::class, 'compareData']);
Route::post('/compare-excel-data2', [ExcelComparisonController::class, 'compareArrays']);
