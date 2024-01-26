@extends('layouts.web')
@section('content')
    <div class="bg-gray-800 h-52">
        <div class="mx-20 py-10 flex space-x-4 items-start">
            <div class="w-44 h-44">
                <img class="object-cover" src="https://random.imagecdn.app/150/150" alt="" srcset="">
            </div>
            <div class="flex-auto">
                <div class="text-white text-xl font-bold">{{ $game->name }}</div>
                <div class="text-white text-xs mt-2">{{ $game->description }}</div>
                <div class="flex items-center justify-between w-60 space-x-2 mt-3">
                    <a href="" class="flex-1 text-center px-2 py-1 bg-orange-500 rounded-md">Web</a>
                    <a href="" class="flex-1 text-center px-2 py-1 bg-orange-500 rounded-md">Android</a>
                    <a href="" class="flex-1 text-center px-2 py-1 bg-orange-500 rounded-md">IOS</a>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow py-2 flex">
        <div class="mx-20 flex">
            <div class="flex border bg-gray-100 rounded-sm border-orange-500">
                <a href="http://"><div class="w-24 bg-orange-500 text-center m-0.5 rounded-sm p-1">Buy</div></a>
                <a href="http://"><div class="w-24 text-center m-0.5 rounded-sm p-1">Sell</div></a>
            </div>
        </div>
        <div class="flex items-center justify-center space-x-1">
            @foreach ($game->gameAssets as $item)
                <a href="{{ url("/game/$game->slug/$item->id") }}">
                    <div class="{{$item->id == $asset->id ? "bg-orange-300" : "bg-orange-200"}}  py-1 rounded-sm px-4 hover:bg-orange-300">
                        {{ $item->name }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="mx-20">
        @foreach ($users as $user)
            <div class="border-b">
                <div class="flex my-2 items-start justify-between space-x-2">
                    <div class="flex space-x-2">
                        <div class="relative w-8 h-8">
                            <img src="https://www.avatarapi.com/images/person2.jpg" alt="" class="w-full h-full rounded-full">
                            <div class="bg-green-500 w-2 h-2 rounded-full absolute right-0 bottom-0.5"></div>
                        </div>
                        <div class="">
                            <div class="flex">
                                <div class="text-orange-500 font-medium">{{ $user->name }}</div>
                            </div>
                            <div class="flex space-x-2 text-xs text-gray-500 mt-1">
                                <div>{{ $user->trades_count ?? 0 }} orders</div>
                                <div class="border-r"></div>
                                <div class="">100.00% completion</div>
                            </div>
                            <div class="flex mt-1 items-center space-x-2">
                                <div><i class="fas fa-thumbs-up text-green-500"></i></div>
                                <div class="text-xs">70.5%</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <div class="flex space-x-4">
                            @foreach ($user->gamePackages()->where('game_asset_id', $asset->id)->orderBy('qty')->get() as $item)
                                <a href="{{ url("trade/$item->id") }}">
                                    <div class="p-1 bg-orange-200 rounded-sm">
                                        <div class="text-xs">{{ $item->qty_symbol }}</div>
                                        <div class="text-sm">${{ $item->price }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection