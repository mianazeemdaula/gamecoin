@extends('layouts.user')
@section('content')
    <div class="bg-gray-800 h-52">
    </div>
    <div class="mx-20 my-4">
        <div class="shadow-sm md:flex rounded-sm md:flex-row flex-col">
            <div class="md:w-8/12 bg-gray-50 p-4">
                <div class="flex my-2 items-start justify-between space-x-2">
                    <div>
                        <div class="relative w-12 h-12">
                            <img src="https://www.avatarapi.com/images/person2.jpg" alt="" class="w-full h-full rounded-full">
                            <div class="bg-green-500 w-2 h-2 rounded-full absolute right-0 bottom-0.5"></div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <div class="flex items-center space-x-4">
                            <div class="text-orange-500 font-medium">{{ 'Name' }}</div>
                            <div class="flex mt-1 items-center space-x-1">
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
                        <div class="text-sm">{{ $payment['purchase_id'] }}</div>
                        <div class="text-gray-500 text-xs">Invoice ID</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">{{ $payment['pay_amount'] }}</div>
                        <div class="text-gray-500 text-xs">Amount to Pay</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-sm">{{ \Carbon\Carbon::parse($payment['valid_until'])->diffForHumans() }}</div>
                        <div class="text-gray-500 text-xs">Expire In</div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="font-bold text-xs">Sellers' Terms (Please read carefully)</p>
                    <p class="text-sm">.</p>
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
                        <p class="text-xs">Scan to Pay</p>
                        <div class="flex mt-4">
                            {!! QrCode::size(120)->generate($payment['pay_address']) !!}
                        </div>
                    </div>
                    <div class="border p-4 rounded-md mt-4">
                        <div class="flex items-center justify-between">
                            <p class="text-xs">I will pay by</p>
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="text-sm mt-2 text-wrap overflow-clip">
                            {{ $payment['pay_address'] }}
                        </div>
                    </div>
                </form>          
            </div>
        </div>
    </div>
@endsection