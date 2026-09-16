<?php

use App\Http\Controllers\AIProxyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
*/

// Main portfolio page
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

// Contact form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// API routes for AI microservice proxy
Route::prefix('api')->group(function () {
    Route::post('/chat', [AIProxyController::class, 'chat'])->name('api.chat');
    Route::get('/github/stats', [AIProxyController::class, 'githubStats'])->name('api.github.stats');
    Route::get('/github/repo/{slug}', [AIProxyController::class, 'githubRepo'])->name('api.github.repo');
});
