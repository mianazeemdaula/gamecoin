@extends('layouts.web')
@section('content')
<header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Your Logo / Brand</h1>
    </div>
</header>

<!-- Navigation Menu -->
<nav class="bg-gray-800 text-white">
    <div class="container mx-auto">
        <ul class="flex justify-end space-x-4 py-2">
            <li><a href="#" class="hover:text-gray-300">Home</a></li>
            <li><a href="#" class="hover:text-gray-300">About</a></li>
            <li><a href="#" class="hover:text-gray-300">Services</a></li>
            <li><a href="#" class="hover:text-gray-300">Contact</a></li>
        </ul>
    </div>
</nav>

@endsection