@extends('auth.layouts.guest')
@section('title', 'Reset Password')

@section('content')
<h2 class="text-3xl font-bold text-center mb-4 text-gray-800">
    Reset Password 🔒
</h2>

<p class="text-center text-gray-600 text-sm mb-6">
    Choose a strong new password to secure your account.
</p>

<form method="POST" action="{{ route('password.update') }}" class="space-y-4">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <input type="email" name="email" value="{{ old('email') }}" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <input type="password" name="password" placeholder="New Password" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <input type="password" name="password_confirmation"
           placeholder="Confirm New Password" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-purple-500">

    <button
        class="w-full py-3 rounded-lg bg-purple-600 text-white font-semibold
               hover:bg-purple-700 transition transform hover:-translate-y-0.5">
        Reset Password
    </button>
</form>
@endsection
