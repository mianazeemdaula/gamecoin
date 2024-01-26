@extends('layouts.web')
@section('content')
    <div class="bg-gray-800 h-52">

    </div>
    <div class="shadow py-2 flex">
        <div class="mx-20 flex">
            <div class="flex border bg-gray-100 rounded-sm border-orange-500">
                <a href="http://"><div class="w-24 bg-orange-500 text-center m-0.5 rounded-sm p-1">Buy</div></a>
                <a href="http://"><div class="w-24 text-center m-0.5 rounded-sm p-1">Sell</div></a>
            </div>
        </div>
        <div class="flex items-center justify-center space-x-1">
        </div>
    </div>
    <div class="mx-20 flex mt-4  space-x-4">
        <div class="w-8/12 bg-gray-50 p-4">
            <div class="text-gray-400">Coin</div>
            <div>1000 - 1000</div>
        </div>
        <div>
            <livewire:trade-chat-wire :trade="$trade" />
        </div>
    </div>
@endsection