<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/about', function () {
    return "this is about PAGE";
});
Route::get('/dp/{id}', function ($id) {
    $message = "This is product {$id}";
    return $message;
});
Route::get('/search', function (Request $req) {
    // $message = "This is product {$req-> q}";
    return view ("search");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/about', [HomeController::class, 'about']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::get('/dp/{id}', [ItemController::class, 'show']);
require __DIR__.'/auth.php';
