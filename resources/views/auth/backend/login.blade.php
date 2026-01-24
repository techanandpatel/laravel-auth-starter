@extends('auth.layouts.guest')
@section('title', 'Admin Login')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 text-gray-900">
    Admin Panel 🔐
</h2>

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" placeholder="Admin Email"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <input type="password" name="password" placeholder="Password"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <button
        class="w-full py-3 rounded-lg bg-gray-900 text-white font-semibold
               hover:bg-black transition transform hover:-translate-y-0.5">
        Login
    </button>
</form>

<a href="{{ route('admin.password.request') }}"
   class="block text-center mt-5 text-sm text-gray-600 hover:underline">
    Forgot password?
</a>
@endsection
