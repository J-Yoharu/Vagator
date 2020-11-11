<?php

use App\Models\User;
use App\Notifications\SendAttachmentToJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TypeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('jobs')->group(function(){
    Route::post('/', [JobController::class, 'store']);
    Route::put('/{id}', [JobController::class, 'update']);
    Route::delete('/{id}', [JobController::class, 'delete']);
});

Route::prefix('jobs')->group(function(){
    Route::get('/filters', [JobController::class, 'filters']);
    Route::get('/search', [JobController::class, 'search']);
    Route::get('/', [JobController::class, 'index']);
    Route::get('/{id}', [JobController::class, 'show']);
});

Route::prefix('applicant')->group(function(){
    Route::post('/',[ApplicantController::class, 'store']);
});

Route::get('locales', [LocaleController::class, 'index']);
Route::get('types', [TypeController::class, 'index']);
Route::get('departments', [DepartmentController::class, 'index']);

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('teste', function(){
   $user = User::find(1);
   $user->notify( new SendAttachmentToJob($user->name));
});

Route::get('curriculum/{filename}', function($filename){

    if( Storage::exists('curriculum/'.$filename) ){
        $file = Storage::path('curriculum/'. $filename);
        return response()->file($file);
    }
    return response()->json(["error" => "Arquivo não existente :("], 404);

});
