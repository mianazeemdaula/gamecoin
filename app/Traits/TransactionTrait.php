<?php

namespace App\Traits;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

trait TransactionTrait
{

    public function updateBalance(float $amount, string $description = null,array $meta = [], $balanceUpdate = true )
    {
        $balance = $this->wallet->balance ?? 0;
        // Create a new transaction
        $debit = $credit = 0;
        if($amount > 0){
            $debit = $amount;
            $credit = 0;
            $balance = $balance + $amount;
        }else {
            $debit = 0;
            $credit = abs($amount);
            $balance = $balance - abs($amount);
        }
        $transaction = new Wallet([
            'balance' => $balance,
            'debit' => $debit,
            'credit' => $credit,
            'description' => $description,
            'user_id' => $this->id,
        ]);
        
        foreach($meta as $key => $value){
            $transaction->{$key} = $value;
        }

        // Associate the transaction with the user
        $this->transactions()->save($transaction);
    }
}
