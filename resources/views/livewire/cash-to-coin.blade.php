<div>
    <div>
        <div class="text-gray-500 text-xs">Price</div>
        <div class="text-2xl font-medium">${{ $item->price ?? '0.00' }}</div>
    </div>
    <div class="border p-4 rounded-md">
        <p class="text-xs">I want to Buy</p>
        <div class="flex mt-4">
            <div class="flex-auto">
                <input type="text" wire:model="amount" class="w-full border-0 focus:ring-0 focus:outline-none placeholder:text-gray-300 font-bold" placeholder="0.00">
            </div>
            <div class="text-sm">USD</div>
        </div>
    </div>

    <div class="border p-4 rounded-md mt-4">
        <p class="text-xs">I will receive</p>
        <div class="flex mt-4">
            <div class="flex-auto">
                <input type="text" readonly class="w-full border-0 focus:ring-0 focus:outline-none placeholder:text-gray-300 font-bold" placeholder="0.00">
            </div>
            <div class="text-sm">{{ $coin }} COINS</div>
        </div>
    </div>
    <div class="mt-4 flex gap-2">
        <button class="bg-gray-300 px-4 py-2 rounded-md text-sm flex-1" >Cancel</button>
        <button class="bg-orange-500 px-4 py-2 rounded-md text-white text-sm flex-auto">Buy Coins</button>
    </div>
</div>
