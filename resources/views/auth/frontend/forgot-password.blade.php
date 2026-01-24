@extends('auth.layouts.guest')
@section('title', 'Forgot Password')

@section('content')
<h2 class="text-3xl font-bold text-center mb-4 text-gray-800">
    Forgot your password? 🔑
</h2>

<p class="text-center text-gray-600 text-sm mb-6">
    No worries. Enter your email and we’ll send you a reset link.
</p>

@if (session('status'))
    <div class="mb-4 text-sm text-green-700 bg-green-100 p-3 rounded-lg">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" placeholder="Email address" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-indigo-500">

    <button
        class="w-full py-3 rounded-lg bg-indigo-600 text-white font-semibold
               hover:bg-indigo-700 transition transform hover:-translate-y-0.5">
        Send Reset Link
    </button>
</form>

<p class="text-center text-sm mt-6">
    Remembered your password?
    <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">
        Back to login
    </a>
</p>
@endsection
