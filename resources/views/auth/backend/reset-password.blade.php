@extends('auth.layouts.guest')
@section('title', 'Admin Reset Password')

@section('content')
<h2 class="text-3xl font-bold text-center mb-4 text-gray-900">
    Set New Admin Password 🔐
</h2>

<p class="text-center text-gray-600 text-sm mb-6">
    This action will update your admin credentials.
</p>

<form method="POST" action="{{ route('password.update') }}" class="space-y-4">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <input type="email" name="email" value="{{ old('email') }}" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <input type="password" name="password" placeholder="New password" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <input type="password" name="password_confirmation"
           placeholder="Confirm new password" required
        class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-gray-800">

    <button
        class="w-full py-3 rounded-lg bg-gray-900 text-white font-semibold
               hover:bg-black transition transform hover:-translate-y-0.5">
        Update Password
    </button>
</form>
@endsection
