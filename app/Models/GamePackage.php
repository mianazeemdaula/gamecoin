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

    public function gameAsset()
    {
        return $this->belongsTo(GameAsset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
