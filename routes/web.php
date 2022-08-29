<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageFileController;

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
    return view('image');
});

Route::get('/file-upload', [ImageFileController::class, 'index']);
Route::post('/file-import', [ImageFileController::class, 'import'])->name('image.import');
Route::post('/add-watermark', [ImageFileController::class, 'imageFileUpload'])->name('image.watermark');
Route::get('/html-image', [ImageFileController::class, 'htmlToImage']);
Route::post('/convert-to-image', [ImageFileController::class, 'convertHtmlToImage'])->name('image.convert');;
