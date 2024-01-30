<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seller_id',
        'game_package_id',
        'end_time',
        'quantity',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function package()
    {
        return $this->belongsTo(GamePackage::class, 'game_package_id');
    }
}
