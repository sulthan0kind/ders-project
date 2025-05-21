<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomentarController;
use App\Models\Komentar;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/store', function () {
    return view('store');
});



Route::get('/', function () {
    $komentars = Komentar::latest()->get();
    return view('index', compact('komentars'));
});

Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
