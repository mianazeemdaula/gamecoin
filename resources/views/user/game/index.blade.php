@extends('layouts.user')
@section('content')
    <div class="mx-20 py-2 ">
        <div class="flex items-center justify-between">
            <h5 class="">Games</h5>
        </div>
        <div class="">
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description</th>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Packages</th>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Count</th>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Time</th>
                            <th scope="col"
                            class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 " id="chatlist">
                        @foreach ($games as $item)
                            <tr>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->id }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->name }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500 flex space-x-3">
                                    @foreach ($item->assets as $asset)
                                        <p class="text-xs">{{ $asset->name }}</p>
                                    @endforeach
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ count($item->assets) }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->created_at }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ url("/user/game/$item->id/edit") }}" class="text-blue-500">Enroll</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <x-web-pagination :paginator="$games" />
        </div>
    </div>
@endsection
