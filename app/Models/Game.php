<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'thumbnail',
        'web_url',
        'android_url',
        'ios_url',
        'is_active',
    ];

    public function assets()
    {
        return $this->hasMany(GameAsset::class, 'game_id', 'id');
    }
}
