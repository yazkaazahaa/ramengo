@extends('layouts.admin')

@section('content')
<div class="w-full h-[calc(100vh-8.5rem)] flex flex-col justify-between p-2 box-border bg-[#dc2626] text-gray-100 font-sans shadow-[inset_0_0_80px_rgba(0,0,0,0.5)] rounded-2xl overflow-hidden">

    <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-4 flex-none mt-1">

        <div class="relative rounded-xl border border-red-500 bg-[#3b0404] p-3 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-red-200 uppercase tracking-widest">JUMLAH MENU</p>
                    <h2 class="mt-0.5 text-2xl font-black text-yellow-300">{{ $totalMenu }}</h2>
                </div>
                <div class="text-2xl">🍜</div>
            </div>
        </div>

        <div class="relative rounded-xl border border-red-500 bg-[#3b0404] p-3 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-red-200 uppercase tracking-widest">TOTAL ORDER</p>
                    <h2 class="mt-0.5 text-2xl font-black text-white">{{ $totalOrder }}</h2>
                </div>
                <div class="text-2xl">📦</div>
            </div>
        </div>

        <div class="relative rounded-xl border border-red-500 bg-[#3b0404] p-3 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-red-200 uppercase tracking-widest">PESANAN SELESAI</p>
                    <h2 class="mt-0.5 text-2xl font-black text-green-400">{{ $pesananSelesai }}</h2>
                </div>
                <div class="text-2xl">✅</div>
            </div>
        </div>

        <div class="relative rounded-xl border border-red-500 bg-[#3b0404] p-3 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-red-200 uppercase tracking-widest">TOTAL PENDAPATAN</p>
                    <h2 class="mt-0.5 text-xl font-black text-yellow-300">Rp {{ number_format($totalPendapatan,0,',','.') }}</h2>
                </div>
                <div class="text-2xl">🏮</div>
            </div>
        </div>

    </div>

    <div class="mt-3 grid gap-3 lg:grid-cols-2 flex-grow h-0">

        <div class="rounded-xl border border-red-600 bg-gradient-to-b from-[#5c0606] to-[#1c0202] p-5 shadow-sm flex flex-col justify-between">
            <h2 class="text-xl font-extrabold text-yellow-300 flex-none flex items-center gap-2">
                <span>🔥</span> Statistik Hari Ini
            </h2>
            
            <div class="space-y-3.5 my-auto flex-grow flex flex-col justify-center">
                <div class="flex items-center justify-between rounded-xl bg-black/40 p-4 border border-red-900/60">
                    <span class="text-sm font-bold text-red-200">Tanggal</span>
                    <span class="text-sm font-extrabold text-white">{{ now()->format('d F Y') }}</span>
                </div>

                <div class="flex items-center justify-between rounded-xl bg-black/50 p-4 border border-red-500">
                    <span class="text-sm font-bold text-yellow-300">Jam Real-time</span>
                    <span id="ramen-live-clock" class="text-lg font-black text-yellow-300 tracking-widest bg-black/70 px-5 py-1 rounded-lg border border-red-900">--:--:--</span>
                </div>

                <div class="flex items-center justify-between rounded-xl bg-black/40 p-4 border border-red-900/60">
                    <span class="text-sm font-bold text-red-200">Total Order</span>
                    <span class="text-sm font-extrabold text-white">{{ $totalOrder }}</span>
                </div>

                <div class="flex items-center justify-between rounded-xl bg-black/40 p-4 border border-red-900/60">
                    <span class="text-sm font-bold text-red-200">Pendapatan</span>
                    <span class="text-sm font-extrabold text-yellow-300 font-mono">Rp {{ number_format($totalPendapatan,0,',','.') }}</span>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-red-600 bg-gradient-to-b from-[#5c0606] to-[#1c0202] p-5 shadow-sm flex flex-col justify-between">
            <h2 class="text-xl font-extrabold text-white flex-none flex items-center gap-2">
                <span>📋</span> Ringkasan Aktivitas
            </h2>

            <div class="space-y-3.5 my-auto flex-grow flex flex-col justify-center text-sm">
                <div class="flex justify-between items-center rounded-xl bg-black/30 p-4 border border-red-900/40">
                    <span class="text-gray-200 text-sm font-medium">Menu tersedia :</span>
                    <b class="text-yellow-300 text-base bg-red-950 px-3 py-1 rounded-md border border-red-600">{{ $totalMenu }}</b>
                </div>
                <div class="flex justify-between items-center rounded-xl bg-black/30 p-4 border border-red-900/40">
                    <span class="text-gray-200 text-sm font-medium">Total Order :</span>
                    <b class="text-orange-300 text-base bg-red-950 px-3 py-1 rounded-md border border-red-600">{{ $totalOrder }}</b>
                </div>
                <div class="flex justify-between items-center rounded-xl bg-black/30 p-4 border border-red-900/40">
                    <span class="text-gray-200 text-sm font-medium">Pesanan selesai :</span>
                    <b class="text-green-400 text-base bg-red-950 px-3 py-1 rounded-md border border-red-600">{{ $pesananSelesai }}</b>
                </div>
                <div class="flex justify-between items-center rounded-xl bg-black/30 p-4 border border-red-900/40">
                    <span class="text-gray-200 text-sm font-medium">Pendapatan :</span>
                    <b class="text-yellow-300 text-base bg-red-950 px-3 py-1 rounded-md border border-red-600 font-mono">Rp {{ number_format($totalPendapatan,0,',','.') }}</b>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    function startRamenClock() {
        const now = new Date();

        document.getElementById("ramen-live-clock")
        .textContent =
            String(now.getHours()).padStart(2,'0') + ":" +
            String(now.getMinutes()).padStart(2,'0') + ":" +
            String(now.getSeconds()).padStart(2,'0');
    }

    setInterval(startRamenClock, 1000);
    startRamenClock();

    // refresh dashboard tiap 30 detik
    setInterval(function () {
        window.location.reload();
    }, 30000);

});
</script>
@endsection
