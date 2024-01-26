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
    $games = App\Models\Game::paginate();
    return view('web.index', compact('games'));
});

Route::get('/game/{game}/{asset?}', function ($game, $asset = null) {
    $game = App\Models\Game::with(['gameAssets'])->where('slug', $game)->first();
    $asset = $asset ? $game->gameAssets()->where('id', $asset)->first() : $game->gameAssets->first();
    $users = App\Models\User::whereHas('gamePackages', function($q) use($asset) {
        $q->where('game_asset_id', $asset->id);
    })->paginate();
    return view('web.trade.seller', compact('game', 'users', 'asset'));
});

Route::get('/trade/{id}', function ($id) {
    $package = App\Models\GamePackage::findOrFail($id);
    return view('user.trade.buy', compact('package'));
});

Route::get('/buy', function () {
    $item = App\Models\GamePackage::with(['user', 'gameAsset'])->find(2);
    $packages = App\Models\GamePackage::orderBy('qty')->paginate();
    $asset = $item->gameAsset;
    return view('user.buy', compact('item', 'asset', 'packages'));
});

Route::get('games', [\App\Http\Controllers\WebController::class, 'games']);

Route::get('login', [\App\Http\Controllers\WebController::class, 'login']);
Route::post('login', [\App\Http\Controllers\WebController::class, 'doLogin'])->name('login');

Route::middleware(['auth'])->group(function(){
    Route::post('logout', [\App\Http\Controllers\WebController::class, 'logout'])->name('logout');
    
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('/', [\App\Http\Controllers\WebController::class, 'dashboard'])->name('dashboard');
        Route::resource('deposit', \App\Http\Controllers\User\DepositController::class);
        Route::resource('trade', \App\Http\Controllers\User\TradeController::class);
    });
});