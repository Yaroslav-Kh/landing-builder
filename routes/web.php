<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Pages\LandingController;

Route::domain('landings-local.jun')->group(function () {
    Route::redirect('/', '/login');
});

$domains = \App\Models\Domain::select('domain')->get()->toArray();

foreach ($domains as $domain) {
    Route::domain($domain['domain'])->group(function () {
        Route::get('/', [\App\Http\Controllers\SiteController::class, 'index']);
    });
}

Route::middleware(['auth'])->group(function () {
    Route::resource('/landings', LandingController::class);
});

require __DIR__.'/auth.php';




