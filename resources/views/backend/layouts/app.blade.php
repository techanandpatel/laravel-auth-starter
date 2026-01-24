<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white p-4">
        <h2 class="text-xl font-bold mb-6">Admin</h2>
        <ul class="space-y-2">
            <li><a href="/admin/dashboard" class="block hover:text-gray-300">Dashboard</a></li>
            <li><a href="#" class="block hover:text-gray-300">Users</a></li>
        </ul>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
