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
            @foreach ($assets as $item)
                <a href="http://">
                    <div class="bg-orange-200 py-1 rounded-sm px-4 hover:bg-orange-300">
                        {{ $item->name }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="mx-20">
        @foreach ($trades as $item)
            <div class="border-b">
                <div class="flex my-2 items-start justify-between space-x-2">
                    <div>
                        <div class="relative w-8 h-8">
                            <img src="https://www.avatarapi.com/images/person2.jpg" alt="" class="w-full h-full rounded-full">
                            <div class="bg-green-500 w-2 h-2 rounded-full absolute right-0 bottom-0.5"></div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <div class="flex">
                            <div class="text-orange-500 font-medium">{{ $item->user->name }}</div>
                        </div>
                        <div class="flex space-x-2 text-sm text-gray-500 mt-1">
                            <div>877 orders</div>
                            <div class="border-r"></div>
                            <div>100.00% completion</div>
                        </div>
                        <div class="flex mt-1 items-center space-x-2">
                            <div><i class="fas fa-thumbs-up text-green-500"></i></div>
                            <div class="text-xs">70.5%</div>
                        </div>
                    </div>
                    <div class="w-1/4">
                        <div class="text-gray-400">{{ $item->gameAsset->name }}</div>
                        <div>{{ $item->qty }} - {{ $item->qty }}</div>
                    </div>
                    <div class="w-1/4">
                        <div class="">${{ $item->price }}</div>
                    </div>
                    <div class="">
                        <a href="{{ url('/buy') }}" class="bg-orange-500 px-4 py-1 rounded-md text-white text-sm">Buy Coins</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection