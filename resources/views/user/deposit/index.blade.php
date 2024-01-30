@extends('layouts.user')
@section('content')
    <div class="mx-20 py-2">
        <div class="flex items-center justify-between">
            <h5 class="">Users</h5>
        </div>
        <div class="bg-white">
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
                                Debit</th>
                                <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Credit</th>
                                <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Balance</th>
                                <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Currency</th>
                                <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Time</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 " id="chatlist">
                        @foreach ($deposits as $item)
                            <tr>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->id }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->description }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->debit }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->credit }}
                                </td>
                                
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->balance }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->tx_currency }}
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <x-web-pagination :paginator="$deposits" />
        </div>
    </div>
@endsection
