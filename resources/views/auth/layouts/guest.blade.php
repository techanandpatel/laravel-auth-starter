<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Auth')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-slide {
            animation: fadeSlide .6s ease-out;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600">

    <div class="w-full max-w-md px-4">
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-2xl p-8 animate-fade-slide">
            @yield('content')
        </div>
    </div>

</body>
</html>
