<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Livewire\Profile\ProfileEdit;
use App\Livewire\Profile\ProfileIndex;
use App\Livewire\Project\ProjectCreate;
use App\Livewire\Project\ProjectEdit;
use App\Livewire\Project\ProjectIndex;
use App\Livewire\Project\ProjectShow;
use App\Livewire\Testimonial\TestimonialEdit;
use App\Livewire\Testimonial\TestimonialIndex;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, "index"])->name("index");
Route::post('/message', [IndexController::class, "store"])->name("message");


// Management Portifilo

Route::middleware('guest')->group(function () {
    Route::get("/login", [LoginController::class, "login"])->name("login");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");
});

Route::post("logout", [LoginController::class, "logout"])->name('logout')->middleware("auth");

Route::middleware("auth")->prefix("admin")->name("admin.")->group(function () {

    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");

    Route::get("/projects", ProjectIndex::class)->name("project.index");
    Route::get("/projects/create", ProjectCreate::class)->name("project.create");
    Route::get("/projects/{project}/edit", ProjectEdit::class)->name("project.edit");
    Route::get("/projects/{project}/show", ProjectShow::class)->name("project.show");

    // Profile

    Route::get("profiles", ProfileIndex::class)->name("profile.index");
    Route::get("profiles/edit", ProfileEdit::class)->name("profile.edit");

    // Testimonials

    Route::get("testimonials", TestimonialIndex::class)->name("testimonial.index");
    Route::get("testimonials/{testimonial}/edit", TestimonialEdit::class)->name("testimonial.edit");
});


Route::get('/run-migrate', function () {
    Artisan::call('migrate', ['--force' => true]);

    return '<h3>Migration Completed:</h3><pre>' . Artisan::output() . '</pre>';
});

Route::get('/run-seed', function () {
    Artisan::call('db:seed', ['--force' => true]);

    return '<h3>Seeding Completed:</h3><pre>' . Artisan::output() . '</pre>';
});

Route::get('/run-optimize', function () {
    Artisan::call('optimize:clear');

    return '<h3>System Optimized & Cache Cleared:</h3><pre>' . Artisan::output() . '</pre>';
});

Route::get('/generate-key', function () {
    \Illuminate\Support\Facades\Artisan::call('key:generate');
    return 'Application Key Generated Successfully!';
});
