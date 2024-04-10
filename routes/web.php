<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Webhook\WebhookEvrasiaController;
use App\Http\Controllers\Webhook\WebhookFd4gdController;
use App\Http\Controllers\Webhook\WebhookMiasushiController;
use App\Http\Controllers\Webhook\WebhookPlastekController;
use App\Http\Controllers\Webhook\WebhookZsushiController;
use App\Http\Controllers\Webhook\WebhookReshetkaController;
use App\Http\Controllers\OnlyWork\OnlyWorkController;
use Illuminate\Foundation\Application;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/onlywork', [OnlyWorkController::class, 'index']);

Route::get('/pinbox', [\App\Http\Controllers\PinboxController::class, 'pinbox'])->name('pinbox.index');

Route::post('/evrasia_webhook', ['nocsrf' => true, WebhookEvrasiaController::class, 'evrasia_webhook'])->name('evrasia_webhook');
Route::get('/evrasia_webhook', ['nocsrf' => true, WebhookEvrasiaController::class, 'evrasia_webhook'])->name('evrasia_webhook');
Route::post('/fd4gd_webhook', ['nocsrf' => true, WebhookFd4gdController::class, 'fd4gd_webhook'])->name('fd4gd_webhook');
Route::post('/miasushi_webhook', ['nocsrf' => true, WebhookMiasushiController::class, 'miasushi_webhook'])->name('miasushi_webhook');
Route::post('/zsushi_webhook', ['nocsrf' => true, WebhookZsushiController::class, 'zsushi_webhook'])->name('zsushi_webhook');
Route::post('/plastek_webhook', ['nocsrf' => true, WebhookPlastekController::class, 'plastek_webhook'])->name('plastek_webhook');
Route::get('/plastek_webhook', ['nocsrf' => true, WebhookPlastekController::class, 'plastek_webhook'])->name('plastek_webhook');
Route::post('/reshetka_webhook', ['nocsrf' => true, WebhookReshetkaController::class, 'reshetka_webhook'])->name('reshetka_webhook');
Route::get('/reshetka_webhook', ['nocsrf' => true, WebhookReshetkaController::class, 'reshetka_webhook'])->name('reshetka_webhook');

Route::get('/main', function () {
    return Inertia::render('Main');
})->middleware(['auth', 'verified'])->name('main');

Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'index'])->middleware(['auth', 'verified'])->name('clients.index');
Route::get('/clients/create', [\App\Http\Controllers\ClientController::class, 'create'])->middleware(['auth', 'verified'])->name('clients.create');
Route::post('/clients', [\App\Http\Controllers\ClientController::class, 'store'])->middleware(['auth', 'verified'])->name('clients.store');
Route::patch('/clients/{client}', [\App\Http\Controllers\ClientController::class, 'update'])->middleware(['auth', 'verified'])->name('clients.update');

Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'index'])->middleware(['auth', 'verified'])->name('contracts.index');
Route::get('/contracts/create', [\App\Http\Controllers\ContractController::class, 'create'])->middleware(['auth', 'verified'])->name('contracts.create');
Route::post('/contracts', [\App\Http\Controllers\ContractController::class, 'store'])->middleware(['auth', 'verified'])->name('contracts.store');
Route::patch('/contracts/{contract}', [\App\Http\Controllers\ContractController::class, 'update'])->middleware(['auth', 'verified'])->name('contracts.update');

Route::get('/energy', [\App\Http\Controllers\EnergyController::class, 'index'])->middleware(['auth', 'verified'])->name('energy.index');
Route::get('/energy/create', [\App\Http\Controllers\EnergyController::class, 'create'])->middleware(['auth', 'verified'])->name('energy.create');
Route::post('/energy', [\App\Http\Controllers\EnergyController::class, 'store'])->middleware(['auth', 'verified'])->name('energy.store');
Route::patch('/energy/{energy}', [\App\Http\Controllers\EnergyController::class, 'update'])->middleware(['auth', 'verified'])->name('energy.update');

Route::get('/energy_requests', [\App\Http\Controllers\EnergyRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('energy_requests.index');
Route::get('/energy_requests/create', [\App\Http\Controllers\EnergyRequestController::class, 'create'])->middleware(['auth', 'verified'])->name('energy_requests.create');
Route::post('/energy_requests', [\App\Http\Controllers\EnergyRequestController::class, 'store'])->middleware(['auth', 'verified'])->name('energy_requests.store');
Route::patch('/energy_requests/{energy_request}', [\App\Http\Controllers\EnergyRequestController::class, 'update'])->middleware(['auth', 'verified'])->name('energy_requests.update');

Route::get('/rates', function () {
    return Inertia::render('Rates');
})->middleware(['auth', 'verified'])->name('rates');

Route::get('/water', function () {
    return Inertia::render('Water');
})->middleware(['auth', 'verified'])->name('water');

Route::get('/energy_requests', function () {
    return Inertia::render('EnergyRequests');
})->middleware(['auth', 'verified'])->name('energy_requests');

Route::get('/services', function () {
    return Inertia::render('Services');
})->middleware(['auth', 'verified'])->name('services');

Route::get('/advance', function () {
    return Inertia::render('Advance');
})->middleware(['auth', 'verified'])->name('advance');

Route::get('/forms', function () {
    return Inertia::render('Forms');
})->middleware(['auth', 'verified'])->name('forms');

Route::get('/client_sets', function () {
    return Inertia::render('ClientSets');
})->middleware(['auth', 'verified'])->name('client_sets');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
