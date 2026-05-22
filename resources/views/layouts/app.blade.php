<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>RamenGo</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-orange-50">

    <div class="container mx-auto px-8 py-8">

        @include('partials.navbar')

        @if(session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif

        <main>

            @yield('content')

        </main>

    </div>

</body>

</html>