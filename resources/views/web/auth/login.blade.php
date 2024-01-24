@extends('layouts.web')
@section('content')
<div class="flex flex-col bg-gray-800 min-h-screen">
    <div class="h-40">
        <div class="container mx-auto flex items-center h-full">
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-white">Login</h1>
            </div>
        </div>
    </div>
    <div class="mx-20 mt-10">
       <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="text-lg">Log In</div>
            <div>
                <p class="text-white">Email</p>
                <input type="email" name="email" id="" class=" bg-gray-800 p-2 rounded-sm border border-gray-200">
            </div>

            <div class="mt-4">
                <p class="text-white">Password</p>
                <input type="password" name="password" id="" class=" bg-gray-800 p-2 rounded-sm border border-gray-200">
            </div>
            <div class="mt-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-sm">Login</button>
            </div>
       </form>
    </div>
</div>
    
@endsection