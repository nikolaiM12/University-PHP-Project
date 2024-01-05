<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;


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
Route::get('/register', [RegisterController::class, 'register'])->name('auth.register');
Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'App\Http\Controllers\HomeController@index', 'index')->name('home.index');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('permission', PermissionController::class);
    Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
    Route::put('/profile/{id}', 'App\Http\Controllers\UserController@postProfile')->name('user.postProfile');
    Route::get('/password/change', 'App\Http\Controllers\UserController@getPassword')->name('userGetPassword');
    Route::post('/password/change', 'App\Http\Controllers\UserController@postPassword')->name('userPostPassword');
    Route::get('/changePhoto', 'App\Http\Controllers\UserController@changePhoto')->name('profileChangePhoto');
    Route::post('change-profile-picture','App\Http\Controllers\UserController@updatePhoto')->name('adminPictureUpdate');
    Route::resource('user', UserController::class)->except(['show']);
    Route::post('/user/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
    Route::get('/user/search', 'App\Http\Controllers\UserController@search')->name('user.search');
    Route::post('image-upload', [UserController::class, 'imageUpload'])->name('imageUpload');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::post('/contact', [ContactController::class, 'storeContact'])->name('contact.store');
    Route::resource('author', AuthorController::class);
    Route::get('author/{author}/delete', 'App\Http\Controllers\AuthorController@delete')->name('author.delete');
    Route::resource('book', BookController::class);
    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('book/{book}/delete', 'App\Http\Controllers\BookController@delete')->name('book.delete');
    Route::get('/search', 'App\Http\Controllers\BookController@search')->name('book.search');
    Route::get('category/{category}/delete', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');
    Route::get('loan/{loan}/delete', 'App\Http\Controllers\LoanController@delete')->name('loan.delete');
    Route::get('notification/{notification}/delete', 'App\Http\Controllers\NotificationController@delete')->name('notification.delete');
    Route::get('review/{review}/delete', 'App\Http\Controllers\ReviewController@delete')->name('review.delete');
    Route::resource('category', CategoryController::class);
    Route::resource('loan', LoanController::class);
    Route::resource('notification', NotificationController::class);
    Route::resource('review', ReviewController::class);
});

Route::group(['middleware' => ['auth', 'role:admin|create user|create role|create permission']], function() {
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::post('/user', 'App\Http\Controllers\UserController@store')->name('user.store');
});


Route::group(['middleware' => 'auth.unauthenticated'], function() 
{
    Route::get('/book', [BookController::class, 'details'])->name('book.details');
});

Auth::routes();






