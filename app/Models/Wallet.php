<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['balance', 'debit', 'credit', 'description', 'user_id', 'tx_id', 'tx_amount', 'tx_currency'];
}
