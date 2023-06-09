<?php


use App\Http\Livewire\Song\Edit;
use App\Http\Livewire\Song\Show;
use Illuminate\Support\Facades\Route;

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
/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    /*Route::get('/', function () {
        return view('dashboard');
    });*/
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/song/{song}', Show::class);
    Route::get('/song/{song}/edit', Edit::class);
    Route::get('/songs', function () {
        return view('songs');
    })->name('songs');
    Route::get('/sets', function () {
        return view('sets');
    })->name('sets');
});
