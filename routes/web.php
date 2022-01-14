<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\dateabilitydeetsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ReligionsController;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {


Route::get('admin/gender',[GendersController::class,'index']);
Route::post('admin/gender/store',[GendersController::class,'store']);
Route::get('admin/gender/edit/{id}',[GendersController::class,'edit']);
Route::post('admin/gender/update/{id}',[GendersController::class,'update']);
Route::post('admin/gender/destroy/{id}',[GendersController::class,'destroy']);

Route::get('admin/education',[EducationController::class,'index']);
Route::post('admin/education/store',[EducationController::class,'store']);
Route::get('admin/education/edit/{id}',[EducationController::class,'edit']);
Route::post('admin/education/update/{id}',[EducationController::class,'update']);
Route::post('admin/education/destroy/{id}',[EducationController::class,'destroy']);

Route::get('admin/politics',[PoliticsController::class,'index']);
Route::post('admin/politics/store',[PoliticsController::class,'store']);
Route::get('admin/politics/edit/{id}',[PoliticsController::class,'edit']);
Route::post('admin/politics/update/{id}',[PoliticsController::class,'update']);
Route::post('admin/politics/destroy/{id}',[PoliticsController::class,'destroy']);


Route::get('admin/children',[ChildrenController::class,'index']);
Route::post('admin/children/store',[ChildrenController::class,'store']);
Route::get('admin/children/edit/{id}',[ChildrenController::class,'edit']);
Route::post('admin/children/update/{id}',[ChildrenController::class,'update']);
Route::post('admin/children/destroy/{id}',[ChildrenController::class,'destroy']);


Route::get('admin/religion',[ReligionsController::class,'index']);
Route::post('admin/religion/store',[ReligionsController::class,'store']);
Route::get('admin/religion/edit/{id}',[ReligionsController::class,'edit']);
Route::post('admin/religion/update/{id}',[ReligionsController::class,'update']);
Route::post('admin/religion/destroy/{id}',[ReligionsController::class,'destroy']);


Route::post('admin/dateabilitydeets/store',[DateabilitydeetsController::class,'store']);
Route::get('admin/dateabilitydeets/edit/{id}',[DateabilitydeetsController::class,'edit']);
Route::post('admin/dateabilitydeets/update/{id}',[DateabilitydeetsController::class,'update']);
Route::post('admin/dateabilitydeets/destroy/{id}',[DateabilitydeetsController::class,'destroy']);

Route::get('admin/dateabilitydeets',[DateabilitydeetsController::class,'index']);

Route::post('admin/interests/store',[InterestsController::class,'store']);
Route::get('admin/interests/edit/{id}',[InterestsController::class,'edit']);
Route::post('admin/interests/update/{id}',[InterestsController::class,'update']);
Route::post('admin/interests/destroy/{id}',[InterestsController::class,'destroy']);
Route::get('admin/interests',[InterestsController::class,'index']);

    Route::post('admin/pronouns/store',[PronounsController::class,'store']);
    Route::get('admin/pronouns/edit/{id}',[PronounsController::class,'edit']);
    Route::post('admin/pronouns/update/{id}',[PronounsController::class,'update']);
    Route::post('admin/pronouns/destroy/{id}',[PronounsController::class,'destroy']);
    Route::get('admin/pronouns',[PronounsController::class,'index']);

});

//Route::resource('admin.gender',gendercontroller::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
