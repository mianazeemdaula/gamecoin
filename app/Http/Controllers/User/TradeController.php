<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameAsset;
use App\Models\GamePackage;
use App\Models\Trade;

class TradeController extends Controller
{

    public function store(Request $request)
    {
        $package = GamePackage::findOrFail($request->package);
        $user = auth()->user();
        $trade = $user->trades()->create([
            'game_package_id' => $package->id,
            'seller_id' => $package->user_id,
            'end_time' => now()->addMinutes($package->gameAsset->game->trade_time),
            'status' => 'pending',
        ]);
        $extradata = [
            'tx_id' => '001',
            'tx_amount' => $package->price,
            'tx_currency' => 'usd',
        ];
        $user->updateBalance($package->price , "Hold for trade $trade->id", $extradata);
        return redirect()->route('user.trade.show', $trade->id);
    }

    public function show($id)
    {
        $trade = Trade::findOrFail($id);
        return view('user.trade.show', compact('trade'));
    }
    
}
