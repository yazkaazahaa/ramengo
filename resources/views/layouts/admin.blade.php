<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])

    <title>Admin - RamenGo</title>

</head>

<body class="bg-orange-50">

<nav class="bg-orange-500 shadow-lg">

<div class="container mx-auto px-8 py-5 flex justify-between items-center">

<h1 class="text-3xl font-bold text-white">

🍜 RamenGo Admin

</h1>

<div class="flex items-center gap-6">

<span class="text-white font-semibold">
   {{ optional(Auth::user())->name }}
</span>

<a
href="{{ route('admin.index') }}"
class="text-white font-semibold hover:text-orange-100">

Dashboard 📊

</a>

<a
href="{{ route('admin.menu.index') }}"
class="text-white font-semibold hover:text-orange-100">

Menu 🍜

</a>

<a
href="{{ route('content.index') }}"
class="text-white font-semibold hover:text-orange-100">

Konten Website 📝

</a>

<a
href="{{ route('admin.meja.index') }}"
class="text-white font-semibold hover:text-orange-100">

Meja

</a>

<a
href="{{ route('admin.report') }}"
class="text-white font-semibold hover:text-orange-100">

Laporan 📋

</a>

<a
href="{{ route('profile.edit') }}"
class="text-white font-semibold hover:text-orange-100">

Profile 👤

</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="bg-white text-orange-500 px-4 py-2 rounded-xl font-bold">
        Logout 🚪
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
