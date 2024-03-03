<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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


Route::get('/', action: function () {
//    \App\Jobs\SummariseContact::dispatch(\App\Models\Contact::find(2));
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard',[
            'info' => auth()->user()->currentTeam?->info
        ]);
    })->name('dashboard');

    Route::post('/info', function (Request $request) {
        $user = auth()->user();
        $team = $user->currentTeam;
        $team->update($request->validate(['info' => 'required|string']));
        return to_route('dashboard');
    })->name('teams.info.store');

    Route::put('/info', function (Request $request) {
        $user = auth()->user();
        $team = $user->currentTeam;
        $team->update($request->validate(['info' => 'required|string']));
        session()->flash('message', 'Team info added.');
        return to_route('dashboard');
    })->name('teams.info.update');

    Route::resource('contact', ContactController::class);
});
