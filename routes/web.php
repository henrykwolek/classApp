<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeworkController;
use App\Models\Homework;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

//Strona główna
Route::get('/', function () {
    return view('home');
})->name('home');
//Wyświetlenie formularza do rejestracji
Route::get('/register', [
    RegisterController::class, 'index'
])->name('register');
//Zabranie informacji użytkownika metodą @store i utworzenie konta
Route::post('/register', [
    RegisterController::class, 'store'
]);
//Przekierowanie zarejestrowanego użytkownika do strony login
Route::get('/login', [
    LoginController::class, 'index'
])->name('login');
//Zalogowanie użytkownika
Route::post('/login', [
    LoginController::class, 'signIn'
]);
//Przekierowanie użytkownika do jego profilu
Route::get('/dashboard', [
    DashboardController::class, 'index'
])->name('dashboard');
//Wylogowanie użytkownika
Route::post('/logout', [
    LogoutController::class, 'logoutUser'
])->name('logout');
//Formularz do dodawanie zadań domowych
Route::get('dashboard/zadania/add', [
    HomeworkController::class, 'index'
])->name('zadanieAdd');
//Zapisanie zadania domowego
Route::post('dashboard/zadania/add', [
    HomeworkController::class, 'store'
]);


// Route::get('/posts', function () {
//     return view('posts.index');
// })->name('viewposts');
