@extends('layouts.web')
@section('content')
    <div class="bg-gray-800 h-52">
    </div>
    <div class="mx-20 my-4">
        <div class="shadow-sm flex rounded-sm">
            <div class="w-8/12 bg-gray-50 p-4">
                <div class="flex my-2 items-start justify-between space-x-2">
                    <div>
                        <div class="relative w-8 h-8">
                            <img src="https://www.avatarapi.com/images/person2.jpg" alt="" class="w-8 h-8 rounded-full">
                            <div class="bg-green-500 w-2 h-2 rounded-full absolute right-0 bottom-0.5"></div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <div class="flex items-start space-x-2">
                            <div class="text-orange-500 font-medium">{{ $package->user->name ?? 'Name' }}</div>
                            <div class="flex mt-1 items-center space-x-2">
                                <div><i class="fas fa-thumbs-up text-green-500"></i></div>
                                <div class="text-xs">70.5%</div>
                            </div>
                        </div>
                        <div class="flex space-x-2 text-sm text-gray-500 mt-1">
                            <div>{{ $package->user->trade_count ?? 0 }} orders</div>
                            <div class="border-r"></div>
                            <div>100.00% completion</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <div class="flex flex-col items-center">
                        <div class="text-sm">{{ $package->asset->game->trade_time }} Minutes</div>
                        <div class="text-gray-500 text-xs">Delivery Time</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">4.73 Minutes</div>
                        <div class="text-gray-500 text-xs">Avg. Release Time</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">{{ $package->qty_symbol }}</div>
                        <div class="text-gray-500 text-xs">Package</div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="font-bold text-xs">Sellers' Terms (Please read carefully)</p>
                    <p class="text-sm">1. Please do not mention anything about buying or selling coins in the game.</p>
                </div>
            </div>
            <div class="p-4 flex-auto">
                {{-- <livewire:cashToCoin /> --}}
                <div class="">
                    <div class="text-gray-600 text-lg">{{ $package->asset->game->name ?? 'Asset Name' }}</div>
                    <div class="bg-gray-200 p-2 rounded-lg mt-2">{{ $package->asset->name ?? 'Asset Name' }}</div>
                    <div class="mt-6">{{ $package->qty_symbol ?? 0 }}  for  ${{ $package->price ?? 0 }}</div>
                    <form action="{{ route('user.trade.store') }}" method="post" class="mt-6">
                        @csrf
                        <input type="hidden" name="package" value="{{ $package->id }}">
                        <button type="submit" class="bg-orange-500 px-4 py-1 rounded-md text-white text-sm w-full">Buy Coins</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection