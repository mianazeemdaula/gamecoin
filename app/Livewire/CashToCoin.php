<?php

namespace App\Livewire;

use Livewire\Component;

class CashToCoin extends Component
{
    public $amount = 1;
    public $coin;
    public $rate;

    public function mount()
    {
        $this->rate = 0.0001;
        $this->coin = $this->rate * $this->amount;
    }

    public function render()
    {
        return view('livewire.cash-to-coin');
    }

    public function changeRate()
    {
        $this->coin = $this->amount * $this->rate;
    }

    public function updatedAmount()
    {
        $this->coin = $this->amount * $this->rate;
    }
}
