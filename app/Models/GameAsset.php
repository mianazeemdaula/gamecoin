<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'description',
        'image',
        'thumbnail',
        'is_active',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
