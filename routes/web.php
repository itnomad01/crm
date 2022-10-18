<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientBidController;
use App\Http\Controllers\ClientContractController;
use App\Http\Controllers\ClientRepresentativeController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BidEventController;
use App\Http\Controllers\UserController;

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

Auth::routes(['register' => false, 'reset' => false,'verify' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'clients' => ClientController::class,
        'clients.bids' => ClientBidController::class,
        'clients.contracts' => ClientContractController::class,
        'clients.representatives' => ClientRepresentativeController::class,
        'representatives' => RepresentativeController::class,
        'bids' => BidController::class,
        'bids.events' => BidEventController::class,
        'events' => EventController::class,
        'contracts' => ContractController::class,
        'users' => UserController::class
    ]);
});
