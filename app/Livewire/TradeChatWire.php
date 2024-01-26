<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TradeChat;

class TradeChatWire extends Component
{
    public $user;

    public $messages = [];
    public $message;
    public $trade;

    protected $listeners = ["echo:trade-chat.2,TradeChatNewMessageEvent" => 'newMessageUpdate'];

    public function mount($trade)
    {
        $this->user = auth()->user();
        $this->trade = $trade;
    }

    public function sendMessage()
    {
        $nMsg = TradeChat::create([
            'trade_id' => $this->trade->id,
            'user_id' => $this->user->id,
            'message' => $this->message,
        ]);
        \App\Events\TradeChatNewMessageEvent::dispatch($nMsg);
        $this->dispatch('scroll-bottom');
        $this->message = '';
    }

    public function render()
    {
        $this->messages = TradeChat::where('trade_id', $this->trade->id)->get();
        return view('livewire.trade-chat');
    }

    public function newMessageUpdate($data)
    {
        $msg = TradeChat::find($data['message']['id']);
        $this->messages->push($msg);
    }
}
