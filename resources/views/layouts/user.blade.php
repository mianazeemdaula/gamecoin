<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div>
        <div class="bg-gray-800 h-32">
            <div class="h-20 p-2 flex items-center justify-between">
                <div class="text-white flex items-center space-x-4">
                    <div class="text-lg font-bold">CoinGames</div>
                    @foreach (["Buy", "Sell", "Trade", "Games"] as $item)
                        <a class="font-medium hover:text-orange-500" href="{{ url(strtolower($item)) }}" target="" rel="noopener noreferrer">{{ $item }}</a>
                    @endforeach
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-white bg-gray-600 py-2 px-4 rounded-md">${{ auth()->user()->wallet->balance ?? 0 }}</div>
                    <a href="{{ route('user.deposit.create') }}" class="bg-orange-500 px-4 py-2 rounded-md shadow-sm text-white">Deposit</a>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>