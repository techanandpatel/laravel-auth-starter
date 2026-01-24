<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<header class="border-b p-4">
    <nav class="flex justify-between">
        <a href="/" class="font-bold">MySite</a>
        <div>
            <a href="/login" class="mr-4">Login</a>
            <a href="/register">Register</a>
        </div>
    </nav>
</header>

<main class="p-6">
    @yield('content')
</main>

<footer class="border-t p-4 text-center text-sm text-gray-500">
    © {{ date('Y') }}
</footer>

</body>
</html>
