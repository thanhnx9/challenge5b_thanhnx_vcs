<?php

use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /******************Change password**********************/
    Route::get('/changePassword', 'App\Http\Controllers\Auth\ChangePassword@showChangePasswordForm')->name('showchangePassword');
    Route::post('/changePassword','App\Http\Controllers\Auth\ChangePassword@changePassword')->name('changePassword');
    /***********************************************************/

    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::resource('teachers', App\Http\Controllers\TeachersController::class);
    /******Roles*******/
    Route::resource('roles', App\Http\Controllers\RolesController::class);

    /******Everything do with messages*****/
    Route::get('messages/{receiver_id}', 'App\Http\Controllers\MessagesController@create')->name('messages');
    Route::post('messages/to/{receiver_id}', 'App\Http\Controllers\MessagesController@store')->name('send_messages');
    Route::get('outbox', 'App\Http\Controllers\MessagesController@showSentMessage')->name('outbox');
    Route::get('message/delete/{id}', 'App\Http\Controllers\MessagesController@destroy')->name('deleteMessage');
    Route::get('message/edit/{id}', 'App\Http\Controllers\MessagesController@edit')->name('editMessage');
    Route::post('message/updated/{id}', 'App\Http\Controllers\MessagesController@update')->name('updateMessage');

    /*******Task******/
    Route::get('tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');
    Route::post('tasks/store', 'App\Http\Controllers\TaskController@store')->name('storeTask');
    Route::get('tasks/download/{file}', 'App\Http\Controllers\TaskController@download')->name('downloadTask');
    /*********Solutions***/
    Route::get('task/submit/{task_id}', 'App\Http\Controllers\SolutionController@submit')->name('submitSolution');
    Route::post('solution/store/{task_id}', 'App\Http\Controllers\SolutionController@store')->name('storeSolution');
    Route::get('solution', 'App\Http\Controllers\SolutionController@index')->name('solutions');
    Route::get('solution/download/{file}', 'App\Http\Controllers\SolutionController@downloadSolution')->name('downloadSolution');

    /************Challenges**************/
    Route::get('challenges', 'App\Http\Controllers\ChallengesController@index')->name('challenges');
    Route::get('challenge/create', 'App\Http\Controllers\ChallengesController@create')->name('createChallenge');
    Route::post('challenge/store', 'App\Http\Controllers\ChallengesController@store')->name('storeChallenge');
    Route::post('challenge/answer/{folder}', 'App\Http\Controllers\ChallengesController@checkAnswer')->name('checkAnswer');


});
