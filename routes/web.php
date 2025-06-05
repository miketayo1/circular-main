<?php

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DocumentController;
use App\Mail\WelcomMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;


// Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/', [DocumentController::class, 'home'])->name('home');
Route::get('home', [DocumentController::class, 'home']);

Route::post('results', [DocumentController::class, 'postSearch'])->name('post-search');
Route::get('results', [DocumentController::class, 'result'])->name('result');

Route::get('/download/{path}', [DocumentController::class, 'download']);

Route::get('test', [DocumentController::class, 'test']);
Route::get('/view/{id}', [DocumentController::class, 'view']);




Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('sign-up', function () {return redirect('sign-in');})->middleware('guest');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');


Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('home', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	
	
	
	
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
Route::get('adduser', [ProfileController::class, 'addUser'])->middleware('auth')->name('adduser');
Route::post('adduser', [ProfileController::class, 'postAddUser'])->middleware('auth')->name('postadduser');
Route::get('user-management', [ProfileController::class, 'userManagement'])->middleware('auth')->name('user-management');;
Route::get('/delete/{id}', [ProfileController::class, 'deleteUser'])->middleware('auth')->name('delete-user');
Route::get('/edit-user/{id}', [ProfileController::class, 'editUser'])->middleware('auth')->name('edit-user');
Route::post('/edituser/{id}', [ProfileController::class, 'postEditUser'])->middleware('auth')->name('edituser');





Route::post('contact', [DashboardController::class, 'contact'])->middleware('auth')->name('contact');

Route::get('document', [DocumentController::class, 'index'])->middleware('auth')->name('document');
Route::get('create', [DocumentController::class, 'create'])->middleware('auth')->name('create');
Route::post('store', [DocumentController::class, 'store'])->middleware('auth')->name('post-doc');
Route::get('delete-file/{id}', [DocumentController::class, 'destroy'])->middleware('auth')->name('delete-file');


Route::get('activity-log', [LogController::class, 'getLog'])->middleware('auth')->name('get-log');



Route::get('user-token', [ApiController::class, 'getToken'])->middleware('auth')->name('get-token');
Route::post('user-token', [ApiController::class, 'postToken'])->middleware('auth')->name('post-token');

