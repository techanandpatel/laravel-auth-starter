@extends('auth.layouts.guest')
@section('title', 'Register')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 text-gray-800">
    Create Account ✨
</h2>

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <input name="name" placeholder="Full Name"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <input name="email" type="email" placeholder="Email"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <input name="password" type="password" placeholder="Password"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <input name="password_confirmation" type="password" placeholder="Confirm Password"
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <button
        class="w-full py-3 rounded-lg bg-purple-600 text-white font-semibold
               hover:bg-purple-700 transition transform hover:-translate-y-0.5">
        Register
    </button>
</form>

<p class="text-center text-sm mt-6">
    Already have an account?
    <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:underline">
        Login
    </a>
</p>
@endsection
