<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])

    <title>Admin - RamenGo</title>

</head>

<body class="japan-theme">

<nav class="theme-nav">

<div class="container mx-auto flex items-center justify-between px-8 py-5">

<h1 class="text-3xl font-extrabold text-[#D4AF37]">

RamenGo Admin

</h1>

<div class="flex items-center gap-6">

<span class="font-semibold text-[#F4EFEA]/80">
   {{ optional(Auth::user())->name }}
</span>

<a
href="{{ route('admin.index') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">

Dashboard

</a>

<a
href="{{ route('admin.menu.index') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">

Menu

</a>

<a
href="{{ route('content.index') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">

Konten Website

</a>

<a
href="{{ route('admin.meja.index') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">

Meja

</a>

<a
href="{{ route('profile.edit') }}"
class="font-semibold text-[#F4EFEA]/85 hover:text-[#D4AF37]">

Profile

</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="theme-btn rounded-xl px-4 py-2 font-bold">
        Logout
    </button>
</form>

</div>

</div>

</nav>

<div class="container mx-auto p-8">

@yield('content')

</div>

</body>
</html>
