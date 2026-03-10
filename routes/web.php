<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Acceso a las vistas sin necesidad de crear un controlador, solo con la ruta y la vista
//URL, vista, nombre de la ruta
Route::view('/', 'welcome')->name('home');;
Route::view('contacto', 'contact')->name('contact');
Route::view('blog', 'blog')->name('blog');
Route::view('nosotros', 'about')->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
