<?php

use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    if(Auth::check()){
        $user = Auth::user();
        return redirect()->route('message.home', ['slug' => $user->slug]);
    }
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

# ------- Start ------- #

Route::name('message.')->group(function() {
   
    # ------- Register ------- #
    Route::post('/message', [MessageController::class, 'register'])->name('register');

    # ------- Home ------- #
    Route::get('/m/{slug}', [MessageController::class, 'home'])->name('home');

    # ------- Post Message ------- #
    Route::post('/p/{slug}', [MessageController::class, 'postMessage'])->name('post');

    # ------- Post Reply Message ------- #
    Route::post('/p/{slug}/{id}', [MessageController::class, 'postReplyMessage'])->name('post.reply');

});

# ------- End ------- #

// require __DIR__.'/auth.php';
