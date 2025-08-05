<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    // Home routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/contact', [FrontendContactController::class, 'store'])->name('contact.submit');

    // // Services
    // Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    // Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

    // // Projects
    // Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    // Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/admin/messages', ContactController::class);
    Route::resource('/admin/partners', PartnerController::class);
    Route::get('/admin/partners/status/{id}', [PartnerController::class, 'status'])->name('partner.status');

    Route::resource('/admin/teams', TeamController::class);
    Route::get('/admin/teams/status/{id}', [TeamController::class, 'status'])->name('teams.status');

    Route::resource('/admin/testimonials', TestimonialController::class);
    Route::get('/admin/testimonials/status/{id}', [TestimonialController::class, 'status'])->name('testimonials.status');

    Route::resource('/admin/categories', CategoryController::class);

    Route::resource('/admin/projects', ProjectController::class);
    Route::get('/admin/projects/status/{id}', [ProjectController::class, 'status'])->name('projects.status');

    Route::resource('/admin/blog-categories', BlogCategoryController::class);
    Route::resource('/admin/articles', BlogController::class);
    Route::get('/admin/articles/status/{id}', [BlogController::class, 'status'])->name('articles.status');

    Route::resource('/admin/service', ServiceController::class);
    Route::get('/admin/service/status/{id}', [ServiceController::class, 'status'])->name('service.status');

    Route::resource('/admin/settings', SettingsController::class);

    Route::get('/admin/settings/{user}/skills', [SettingsController::class, 'indexSkill'])->name('settings.skill');
    Route::put('/admin/settings/skill/{id}', [SettingsController::class, 'updateSkill'])->name('settings.skill.update');

    Route::get('/admin/settings/{user}/educations', [SettingsController::class, 'indexEdu'])->name('settings.edu');
    Route::put('/admin/settings/educations/{id}', [SettingsController::class, 'updateEdu'])->name('settings.edu.update');

    Route::get('/admin/settings/{user}/socials', [SettingsController::class, 'indexSocial'])->name('settings.social');
    Route::put('/admin/settings/social/{id}', [SettingsController::class, 'updateSocial'])->name('settings.social.update');

    Route::get('/admin/settings/{user}/password', [SettingsController::class, 'indexPass'])->name('settings.pass');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
