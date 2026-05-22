@extends('layouts.kitchen')

@section('content')

<h1 class="text-4xl font-bold text-orange-500 mb-8">

    Kitchen 👨‍🍳

</h1>

@if(session('success'))

<div class="bg-green-100 p-4 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif


<div class="space-y-5">

@foreach($orders as $order)

<div class="bg-white p-6 rounded-2xl shadow-md">

    <div class="flex justify-between items-center">

        <div>

            <h2 class="font-bold text-xl">

                Order #{{ $order->id }}

            </h2>

            <p>

                Meja:
                {{ $order->nomor_meja }}

            </p>

            <p>

                Status:
                {{ $order->status }}

            </p>

        </div>


        <div>

            @if($order->status=="Sudah Dibayar")

            <form
                action="{{ route('kitchen.cook',$order->id) }}"
                method="POST">

                @csrf

                <button
                    class="bg-orange-500 text-white px-5 py-2 rounded-xl">

                    Mulai Masak

                </button>

            </form>

            @endif


            @if($order->status=="Sedang Dimasak")

            <form
                action="{{ route('kitchen.ready',$order->id) }}"
                method="POST">

                @csrf

                <button
                    class="bg-green-500 text-white px-5 py-2 rounded-xl">

                    Siap Diambil

                </button>

            </form>

            @endif

        </div>

    </div>

</div>

@endforeach

</div>

@endsection