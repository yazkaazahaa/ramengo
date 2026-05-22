@extends('layouts.cashier')

@section('content')

<h1 class="text-4xl font-bold text-orange-500 mb-8">

    Kasir 💳

</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif


<div class="space-y-5">

@forelse($orders as $order)

<div class="bg-white p-6 rounded-2xl shadow-md">

<div class="flex justify-between items-center">

<div>

<h2 class="font-bold text-xl">

Order #{{ $order->id }}

</h2>

<p>

Menu:
{{ $order->menu->nama ?? '-' }}

</p>

<p>

Meja:
{{ $order->nomor_meja }}

</p>

<p>

Qty:
{{ $order->quantity }}

</p>

<p>

Status:

@if($order->status=="Menunggu")

<span class="text-yellow-500 font-bold">

Menunggu ⏳

</span>

@elseif($order->status=="Menunggu Dimasak")

<span class="text-blue-500 font-bold">

Menunggu Dimasak 🍳

</span>

@elseif($order->status=="Sedang Dimasak")

<span class="text-orange-500 font-bold">

Sedang Dimasak 🔥

</span>

@elseif($order->status=="Siap Diambil")

<span class="text-green-500 font-bold">

Siap Diambil ✅

</span>

@endif

</p>

</div>


@if($order->status=="Menunggu")

<form
action="{{ route('cashier.paid',$order->id) }}"
method="POST">

@csrf

<button
type="submit"
class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl">

Bayar

</button>

</form>

@endif

</div>

</div>

@empty

<div class="bg-white p-6 rounded-xl text-center">

Belum ada pesanan 🍜

</div>

@endforelse

</div>

@endsection