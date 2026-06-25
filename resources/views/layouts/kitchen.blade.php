<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])

    <title>Kitchen - RamenGo</title>

</head>

<body class="japan-theme">

<nav class="theme-nav">
<a
href="{{ route('kitchen.index') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">
Pesanan Masuk
</a>

<a
href="{{ route('kitchen.cooking') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">
Sedang Dimasak
</a>

<a
href="{{ route('kitchen.history') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">
Riwayat
</a>
<div class="container mx-auto flex items-center justify-between px-8 py-5">

<h1 class="text-3xl font-extrabold text-[#D4AF37]">

Kitchen

</h1>


<div class="flex items-center gap-8">

<

</div>

</div>

</nav>


<div class="container mx-auto p-8">

@yield('content')

</div>

</body>
</html>
