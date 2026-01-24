@extends('auth.layouts.guest')
@section('title', 'Login')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 text-gray-800">
    Welcome Back 👋
</h2>

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" placeholder="Email"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-indigo-500 focus:outline-none">

    <input type="password" name="password" placeholder="Password"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-indigo-500 focus:outline-none">

    <div class="flex justify-between text-sm">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="remember" class="rounded">
            Remember me
        </label>
        <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
            Forgot password?
        </a>
    </div>

    <button
        class="w-full py-3 rounded-lg bg-indigo-600 text-white font-semibold
               hover:bg-indigo-700 transition transform hover:-translate-y-0.5">
        Login
    </button>
</form>

<p class="text-center text-sm mt-6">
    New here?
    <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">
        Create account
    </a>
</p>
@endsection
