<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_asset_id',
        'user_id',
        'name',
        'image',
        'qty',
        'qty_sybmol',
        'price',
        'offer_price',
        'is_active',
    ];

    protected $appends = [
        'qty_symbol',
    ];
    

    public function gameAsset()
    {
        return $this->belongsTo(GameAsset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // add column with name 'qty_symbol' to game_packages table
    public function getQtySymbolAttribute()
    {
        if($this->qty >= 1000 && $this->qty < 1000000) {
            return number_format($this->qty / 1000, 2) . 'K';
        }else if($this->qty >= 1000000 && $this->qty < 1000000000) {
            return number_format($this->qty / 1000000, 2) . 'M';
        }else if($this->qty >= 1000000000 && $this->qty < 1000000000000) {
            return number_format($this->qty / 1000000000, 2) . 'B';
        }else{
            return $this->qty / 1000000000000 . 'T';
        }
    }
}
