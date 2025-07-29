<?php

use Illuminate\Support\Facades\Route;
use Martin3r\Platform\Core\Livewire\Login;
use Martin3r\Platform\Core\Livewire\Register;
use Martin3r\Platform\Core\Livewire\Dashboard;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/', Dashboard::class)->name('platform.dashboard');