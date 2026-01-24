@extends('auth.layouts.guest')
@section('title', 'Admin Password Reset')

@section('content')
<h2 class="text-3xl font-bold text-center mb-4 text-gray-900">
    Admin Password Reset ⚠️
</h2>

<p class="text-center text-gray-600 text-sm mb-6">
    Enter your admin email to receive a secure reset link.
</p>

@if (session('status'))
    <div class="mb-4 text-sm text-green-700 bg-green-100 p-3 rounded-lg">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" placeholder="Admin email" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <button
        class="w-full py-3 rounded-lg bg-gray-900 text-white font-semibold
               hover:bg-black transition transform hover:-translate-y-0.5">
        Send Reset Link
    </button>
</form>

<p class="text-center text-sm mt-6">
    <a href="{{ route('admin.login') }}" class="text-gray-700 hover:underline">
        Back to admin login
    </a>
</p>
@endsection
