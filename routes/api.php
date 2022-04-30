<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChildrenController;
use App\Http\Controllers\Api\dateabilitydeetsController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\GendersController;
use App\Http\Controllers\Api\InterestsController;
use App\Http\Controllers\Api\PhotosController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\PoliticsController;
use App\Http\Controllers\Api\PronounsController;
use App\Http\Controllers\Api\ReligionsController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\LikesController;
use App\Http\Controllers\Api\InterestssListsController;
use App\Http\Controllers\Api\DateabilitydeetsListsController;
use App\Http\Controllers\Api\ProunounsListsController;
use App\Http\Controllers\Api\user_profileController;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/Register',[AuthController::class,'Register']);
Route::post('/Login',[AuthController::class,'Login']);
Route::post('/Forgot',[AuthController::class,'Forgot']);

Route::get('/Children',[ChildrenController::class,'index']);
Route::get('/Dateabilitydeets',[dateabilitydeetsController::class,'index']);
Route::get('/Education',[EducationController::class,'index']);
Route::get('/Genders',[GendersController::class,'index']);
Route::get('/Interests',[InterestsController::class,'index']);
Route::get('/Politics',[PoliticsController::class,'index']);
Route::get('/Pronouns',[PronounsController::class,'index']);
Route::get('/Religions',[ReligionsController::class,'index']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/Logout',[AuthController::class,'Logout']);

    Route::get('/ProunounsLists',[ProunounsListsController::class,'index']);
    Route::get('/ProunounsLists/{id}',[ProunounsListsController::class,'show']);
    Route::post('/ProunounsLists/{id}',[ProunounsListsController::class,'store']);
    Route::delete('/ProunounsLists',[ProunounsListsController::class,'destroy']);

    Route::get('/InterestsLists',[InterestssListsController::class,'index']);
    Route::get('/InterestsLists/{id}',[InterestssListsController::class,'show']);

    Route::post('/InterestsLists/{id}',[InterestssListsController::class,'store']);
    Route::delete('/InterestsLists',[InterestssListsController::class,'destroy']);

    Route::get('/Dateabilitydeetslists',[DateabilitydeetsListsController::class,'index']);
    Route::get('/Dateabilitydeetslists/{id}',[DateabilitydeetsListsController::class,'show']);
    Route::post('/Dateabilitydeetslists/{id}',[DateabilitydeetsListsController::class,'store']);
    Route::delete('/Dateabilitydeetslists',[DateabilitydeetsListsController::class,'destroy']);

    Route::get('/Myprofile', [user_profileController::class,'myprofile']);

    Route::get('/Userprofile', [user_profileController::class,'index']);
    Route::get('/Userprofile/{id}', [user_profileController::class,'show']);
    Route::post('/Userprofile', [user_profileController::class,'store']);

    Route::post('/Match',[MatchController::class,'index']);

    Route::get('/Photos',[PhotosController::class,'index']);
    Route::get('/Photos/{id}',[PhotosController::class,'show']);
    Route::post('/Photos',[PhotosController::class,'store']);
    Route::delete('/Photos/{id}',[PhotosController::class,'destroy']);


    Route::get('/Messages',[MessagesController::class,'index']);
    Route::delete('/Messages/{id}',[MessagesController::class,'destroy']);
    Route::post('/Messages',[MessagesController::class,'store']);

    Route::get('/Likes',[LikesController::class,'who']);
    Route::get('/Me',[LikesController::class,'me']);
    Route::post('/Likes/{id}',[LikesController::class,'new']);
    Route::delete('/Likes/{id}',[LikesController::class,'destroy']);

//
//
//
//
//
//
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
