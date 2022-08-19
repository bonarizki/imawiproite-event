<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WinnerController;

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

Route::get('/', function () {
    return view('pages/index');
});

Route::get('batch/1', function () {
    return view('pages/batch-1');
})->name('batch-1');

Route::get('batch/2', function () {
    return view('pages/batch-2');
})->name('batch-2');

Route::get('batch/3', function () {
    return view('pages/batch-3');
})->name('batch-3');

Route::get('batch/4', function () {
    return view('pages/batch-4');
})->name('batch-4');

Route::get('batch/5', function () {
    return view('pages/batch-5');
})->name('batch-5');

Route::get('batch/6', function () {
    return view('pages/batch-6');
})->name('batch-6');

Route::get('batch/7', function () {
    return view('pages/batch-7');
})->name('batch-7');

Route::get('batch/8', function () {
    return view('pages/batch-8');
})->name('batch-8');

Route::get('batch/9', function () {
    return view('pages/batch-9');
})->name('batch-9');

Route::get('batch/10', function () {
    return view('pages/batch-10');
})->name('batch-10');

Route::get('batch/11', function () {
    return view('pages/batch-11');
})->name('batch-11');

Route::get('batch/12', function () {
    return view('pages/batch-12');
})->name('batch-12');

Route::get('batch/13', function () {
    return view('pages/batch-13');
})->name('batch-13');

Route::get('batch/14', function () {
    return view('pages/batch-14');
})->name('batch-14');

Route::get('batch/15', function () {
    return view('pages/batch-15');
})->name('batch-15');

Route::get('batch/os',function(){
    return view('pages/batch-os');
})->name('batch-os');


Route::get('winner',[WinnerController::class,'getWinner'])->name('getWinner');
Route::get('winnerOS',[WinnerController::class,'getWinnerOS'])->name('getWinnerOS');
Route::get('department_winner',[WinnerController::class,'getdepartwinner'])->name('getDepartment');
Route::get('detail-winner/{nik}',[WinnerController::class,'detailWinner'])->name('detail-winner');
Route::get('detail-winner-os/{nik}',[WinnerController::class,'detailWinnerOS'])->name('detail-winner-os');
Route::get('update-actual',[WinnerController::class,'ActualUpdate'])->name('update-actual');
Route::get('refresh-winner',[WinnerController::class,'gerRefresherNik'])->name('refresh-winner');
Route::get('winnerByDepartment',[WinnerController::class,'GetWInnerDepartment'])->name('winner-department');


