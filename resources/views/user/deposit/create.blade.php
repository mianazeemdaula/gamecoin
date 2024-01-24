@extends('layouts.admin')
@section('content')
<div class="bg-white rounded-lg">
    @foreach ($errors->all() as $error)
        <div class="text-red-500">{{ $error }}</div>
    @endforeach
    
</div>
@endsection
