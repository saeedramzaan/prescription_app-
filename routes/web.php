<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\FormController; 

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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('patient', PatientController::class);

Route::resource('/home', FormController::class);

Route::get('/productInfo', [PatientController::class, 'productInfo'])->name('productInfo');

Route::resource('product', ProductController::class);

Route::get('/create', [PatientController::class,'create'])->name('test');

Route::get('/search', [PatientController::class,'search'] );

Route::get('/del/{id}', [ProductController::class,'delete'] )->name('del');

Route::get('/showItem', [FormController::class,'itemInfo'])->name('item_info');

Route::get('/form',[FormController::class,'create']);
Route::post('form',[FormController::class,'store'])->name('form');
Route::post('saveItem',[FormController::class,'saveItem'])->name('saveItem');

Route::post('saveMaster',[FormController::class,'saveMaster'])->name('saveMaster');

Route::get('clientStatus',[FormController::class,'clientStatus'])->name('clientStatus');

Route::get('masterInfo',[FormController::class,'masterInfo'])->name('masterInfo');

Route::post('masterUpdate',[FormController::class,'masterUpdate'])->name('masterUpdate');

Route::get('pInfo',[PatientController::class,'prescriptionInfo'])->name('pInfo');

Route::get('infoIndex',[PatientController::class,'infoIndex'])->name('infoIndex');

Route::get('indexInfo',[PatientController::class,'indexInfo'])->name('indexInfo');

Route::get('imgInfo',[FormController::class,'imgInfo'])->name('imgInfo');

Route::get('showImage',[FormController::class,'showImage'])->name('showImage');

Route::get('viewPatient',[PatientController::class,'patientView'])->name('viewPatient');










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
