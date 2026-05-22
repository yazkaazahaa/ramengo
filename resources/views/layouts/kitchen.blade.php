<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])

    <title>Kitchen - RamenGo</title>

</head>

<body class="bg-orange-50">

<nav class="bg-orange-500 shadow-lg">

<div class="container mx-auto px-8 py-5 flex justify-between items-center">

<h1 class="text-3xl font-bold text-white">

Kitchen 👨‍🍳

</h1>


<div class="flex items-center gap-8">

<a
href="{{ url('/kitchen') }}"
class="text-white font-semibold hover:text-orange-100">

Pesanan Masuk 🍜

</a>


<a
href="#"
class="text-white font-semibold hover:text-orange-100">

Sedang Dimasak 🔥

</a>


<a
href="#"
class="bg-white text-orange-500 px-4 py-2 rounded-xl font-bold">

Logout 🚪

</a>

</div>

</div>

</nav>


<div class="container mx-auto p-8">

@yield('content')

</div>

</body>
</html>