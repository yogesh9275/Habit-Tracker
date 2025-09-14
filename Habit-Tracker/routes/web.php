<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Habits\{Index, Create, Edit};
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    //Habits
  Route::get('/habits', Index::class)->name('habits.index');
  Route::get('/habits/create', Create::class)->name('habits.create');
  Route::get('/habits/{habit}/edit', Edit::class)->name('habits.edit');
});

require __DIR__ . '/auth.php';
