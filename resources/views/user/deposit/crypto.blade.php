@extends('layouts.web')
@section('content')
    <div class="bg-gray-800 h-52">

    </div>
    <div class="mx-20 my-4">
        <div class="shadow-sm flex rounded-sm">
            <div class="w-8/12 bg-gray-50 p-4">
                <div class="flex my-2 items-start justify-between space-x-2">
                    <div>
                        <div class="relative w-12 h-12">
                            <img src="https://www.avatarapi.com/images/person2.jpg" alt="" class="w-full h-full rounded-full">
                            <div class="bg-green-500 w-2 h-2 rounded-full absolute right-0 bottom-0.5"></div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <div class="flex items-start space-x-2">
                            <div class="text-orange-500 font-medium">{{ 'Name' }}</div>
                            <div class="flex mt-1 items-center space-x-2">
                                <div><i class="fas fa-thumbs-up text-green-500"></i></div>
                                <div class="text-xs">70.5%</div>
                            </div>
                        </div>
                        <div class="flex space-x-2 text-sm text-gray-500 mt-1">
                            <div>877 orders</div>
                            <div class="border-r"></div>
                            <div>100.00% completion</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <div class="flex flex-col items-center">
                        <div class="text-sm">15 Minutes</div>
                        <div class="text-gray-500 text-xs">Delivery Time</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">4.73 Minutes</div>
                        <div class="text-gray-500 text-xs">Avg. Release Time</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">8,008</div>
                        <div class="text-gray-500 text-xs">Available</div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="font-bold text-xs">Sellers' Terms (Please read carefully)</p>
                    <p class="text-sm">1. Please do not mention anything about buying or selling coins in the game.</p>
                </div>
            </div>
            <div class="p-4 flex-auto">
                <form action="{{ route('user.deposit.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="currency" value="BUSDBSC">
                    <div>
                        <div class="text-gray-500 text-xs">Price</div>
                        <div class="text-2xl font-medium">${{ $item->price ?? '0.00' }}</div>
                    </div>
                    <div class="border p-4 rounded-md">
                        <p class="text-xs">I want to Buy</p>
                        <div class="flex mt-4">
                            <div class="flex-auto">
                                <input type="text" value="{{ old('amount') }}" name="amount" class="w-full border-0 focus:ring-0 focus:outline-none placeholder:text-gray-300 font-bold" placeholder="0.00">
                            </div>
                            <div class="text-sm">USD</div>
                        </div>
                    </div>
                    <div class="border p-4 rounded-md mt-4">
                        <p class="text-xs">I will pay by</p>
                        <div class="flex mt-4 space-x-2">
                            @foreach ($coins as $item)
                                <div class="flex flex-col w-20 bg-orange-300 p-2 rounded items-center">
                                    <img src="https://nowpayments.io/{{ $item['icon'] }}" alt="" srcset="" class="w-8">
                                    <div class="text-xs">{{ strtoupper($item['name']) }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <button class="bg-gray-300 px-4 py-2 rounded-md text-sm flex-1" >Cancel</button>
                        <button type="submit" class="bg-orange-500 px-4 py-2 rounded-md text-white text-sm flex-auto">Buy Coins</button>
                    </div>   
                </form>          
            </div>
        </div>
    </div>
@endsection