@extends('layouts.web')
@section('content')
<div class="min-h-screen">
    <div class="bg-gray-800 h-10">

    </div>
    <div class="shadow py-2 flex">
        <div class="mx-20 flex items-center justify-between w-full">
            <div>
                <div class="text-sm">Order Created</div>
                <div class="text-xs" >Transfer to Buyer</div>
            </div>
            <div>
                <div  class="flex text-sm space-x-2 items-center">
                    <div class="">Order</div>
                    <div class="font-bold text-xs">{{$trade->id}}</div>
                </div>
                <div class="flex text text-sm space-x-2 items-center">
                    <div>Time Created </div>
                    <div class="font-bold text-xs">{{ $trade->created_at }} </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-20 flex mt-4  space-x-2">
        <div class="w-8/12 p-4">
            <div class="flex justify-between mt-8">
                <div class="flex flex-col items-center">
                    <div class="text-gray-500 text-xs">Minutes</div>
                    <div class="text-sm">Delivery Time</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-gray-500 text-xs">${{ $trade->package->price }}</div>
                    <div class="text-sm">Cost</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-gray-500 text-xs">{{ $trade->package->qty_symbol }}</div>
                    <div class="text-sm">{{$trade->package->asset->name }}</div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-6">
                <div>
                    <form action="{{ route('user.trade.update', $trade->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="buyer_notify">
                        @method('PUT')
                        <button class="text-xs bg-orange-500 rounded-sm px-4 py-2">Transfered Notify Buyer</button>
                    </form>
                </div>
                <div class="border-r w-2"></div>
                <div class="text-xs"><a href="#">Cancel Order</a></div>
            </div>
        </div>
        <div class="flex-auto">
            <livewire:trade-chat-wire :trade="$trade" />
        </div>
    </div>
</div>
@endsection