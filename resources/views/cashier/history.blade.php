@extends('layouts.cashier')

@section('content')

<h2 class="text-2xl font-bold mb-6">Riwayat Pembayaran 📋</h2>

@if($orders->isEmpty())
    <p class="text-gray-600">Belum ada transaksi.</p>
@else

<table class="w-full bg-white shadow rounded-lg overflow-hidden">

    <thead class="bg-orange-500 text-white">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Meja</th>
            <th class="p-3 text-left">Total</th>
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-left">Tanggal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $order)
        <tr class="border-b">
            <td class="p-3">#{{ $order->id }}</td>
           <td class="p-3">
    {{ $order->nomor_meja }}
</td>
            <td class="p-3">Rp {{ number_format($order->total_harga) }}</td>
<td class="p-3 text-green-600 font-bold">
    Lunas
</td>

           
            <td class="p-3">{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>

</table>

@endif

@endsection('layouts.cashier')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Riwayat Pembayaran 📋
</h2>

@if($orders->isEmpty())

    <p class="text-gray-600">
        Belum ada transaksi.
    </p>

@else

<table class="w-full bg-white shadow rounded-lg overflow-hidden">

    <thead class="bg-orange-500 text-white">
        <tr>
            <th class="p-3 text-left">Order</th>
            <th class="p-3 text-left">Meja</th>
            <th class="p-3 text-left">Total</th>
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-left">Tanggal</th>
        </tr>
    </thead>

    <tbody>

        @foreach($orders as $order)

        <tr class="border-b hover:bg-gray-50">

            <td class="p-3 font-semibold">
                #{{ $order->id }}
            </td>

            <td class="p-3">
                {{ $order->nomor_meja }}
            </td>

            <td class="p-3">
                Rp {{ number_format($order->total_harga) }}
            </td>

            <td class="p-3">
                <span class="font-bold text-green-600">
                    Lunas
                </span>
            </td>

            <td class="p-3">
                {{ $order->created_at->format('d-m-Y H:i') }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endif

@endsection