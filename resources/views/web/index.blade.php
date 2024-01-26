@extends('layouts.web')
@section('content')
    <div class="bg-gray-800 h-52">

    </div>
    <div class="mx-20 my-4">
        <div class="shadow-sm flex rounded-sm">
            <div class="w-8/12 bg-gray-50 p-4">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($games as $item)
                    <a href="{{ url("/game/$item->slug") }}">
                        <img class="w-full object-cover" src="https://random.imagecdn.app/150/150" alt="" srcset="">
                        <div class="text-center p-2 bg-gray-100">{{ $item->name }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="p-4 flex-auto">
                
            </div>
        </div>
    </div>
@endsection