@extends('layouts.admin')

@section('content')

<div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

<div>

<h1 class="text-5xl font-black text-[#D4AF37]">
Data Meja
</h1>

<p class="mt-2 text-orange-100">
Kelola daftar meja dan QR code untuk pelanggan.
</p>

</div>


<div class="flex flex-col gap-3 sm:flex-row">

<form method="POST"
action="{{ route('admin.meja.store') }}">

@csrf

<button
type="submit"

class="
rounded-2xl

bg-gradient-to-r
from-red-600
to-orange-500

px-6
py-4

font-bold
text-white

shadow-[0_0_30px_rgba(255,80,0,.4)]

hover:scale-105

transition">

+ Tambah Meja

</button>

</form>


<a
href="{{ route('admin.meja.cetak') }}"
target="_blank"

class="
rounded-2xl

bg-[#0E1B38]

px-6
py-4

font-bold
text-white

hover:bg-[#152B5B]

transition">

Print / Cetak QR Code

</a>

</div>

</div>



@if(session('success'))

<div
class="
mb-6

rounded-2xl

border
border-green-500/40

bg-green-950

px-5
py-4

font-bold

text-green-300">

{{ session('success') }}

</div>

@endif




<div
class="
overflow-hidden

rounded-3xl

border
border-orange-700/40

bg-[#160605]

shadow-[0_0_60px_rgba(255,100,0,.15)]">

<div class="overflow-x-auto">

<table class="min-w-full">

<thead>

<tr
class="
bg-gradient-to-r

from-red-600
via-red-500
to-red-700

text-[#FFD67A]">

<th class="px-8 py-5 text-left">
ID
</th>

<th class="px-8 py-5 text-left">
NOMOR MEJA
</th>

<th class="px-8 py-5 text-left">
QR CODE
</th>

<th class="px-8 py-5 text-right">
AKSI
</th>

</tr>

</thead>



<tbody>

@forelse($mejas as $meja)

<tr

class="

border-b

border-orange-900/40

transition

hover:bg-[#2A0B05]

hover:text-white

duration-300

">

<td
class="
px-8
py-6

text-orange-100">

{{ $meja->id }}

</td>


<td
class="
px-8
py-6">

<div
class="
text-2xl
font-black
text-[#D4AF37]">

{{ $meja->nomor_meja }}

</div>

<div
class="
text-orange-100">

{{ $meja->qr_url }}

</div>

</td>



<td
class="
px-8
py-6">

<div
class="
flex

h-28
w-28

items-center
justify-center

rounded-2xl

bg-white

p-2

shadow">

{!! $meja->qr_code !!}

</div>

</td>



<td
class="
px-8
py-6

text-right">

<form
method="POST"
action="{{ route('admin.meja.destroy',$meja) }}"

onsubmit="
return confirm(
'Hapus {{ $meja->nomor_meja }} ?'
)
">

@csrf

@method('DELETE')

<button
type="submit"

class="
rounded-2xl

bg-gradient-to-b

from-red-500
to-red-700

px-6
py-3

font-bold

text-white

hover:scale-105

transition">

Hapus

</button>

</form>

</td>

</tr>


@empty

<tr>

<td
colspan="4"

class="
py-20

text-center

text-orange-200">

Belum ada data meja

</td>

</tr>

@endforelse


</tbody>

</table>

</div>

</div>

@endsection