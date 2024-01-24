<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.index');
});

Route::get('/trade', function () {
    $trades = App\Models\GamePackage::paginate();
    $assets = App\Models\GameAsset::where('game_id',1)->get();
    return view('user.trade', compact('trades', 'assets'));
});

Route::get('/buy', function () {
    $item = App\Models\GamePackage::with(['user', 'gameAsset'])->find(2);
    $packages = App\Models\GamePackage::orderBy('qty_sybmol')->paginate();
    $asset = $item->gameAsset;
    return view('user.buy', compact('item', 'asset', 'packages'));
});

Route::get('login', [\App\Http\Controllers\WebController::class, 'login']);
Route::post('login', [\App\Http\Controllers\WebController::class, 'doLogin'])->name('login');

Route::middleware(['auth'])->group(function(){
    Route::post('logout', [\App\Http\Controllers\WebController::class, 'logout'])->name('logout');
    
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('/', [\App\Http\Controllers\WebController::class, 'dashboard'])->name('dashboard');
        Route::resource('deposit', \App\Http\Controllers\User\DepositController::class);
    });
});