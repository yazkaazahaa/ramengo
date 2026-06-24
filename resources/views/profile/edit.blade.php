@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-orange-600">RamenGo Admin</p>
        <h2 class="mt-2 text-3xl font-bold text-gray-900">Profile Admin</h2>
        <p class="mt-2 text-gray-600">Kelola informasi akun dan keamanan password admin RamenGo.</p>
    </div>

    <div class="space-y-6">
        <div class="rounded-xl border border-orange-100 bg-white shadow-lg shadow-orange-100/60">
            <div class="border-b border-orange-100 px-6 py-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-orange-100 text-sm font-bold text-orange-600">
                        PI
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ __('Profile Information') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">{{ __('Name') }}</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="mt-2 block w-full rounded-xl border-gray-300 bg-orange-50/40 px-4 py-3 text-gray-900 shadow-sm transition focus:border-orange-500 focus:ring-orange-500"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">{{ __('Email') }}</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                            class="mt-2 block w-full rounded-xl border-gray-300 bg-orange-50/40 px-4 py-3 text-gray-900 shadow-sm transition focus:border-orange-500 focus:ring-orange-500"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3 rounded-xl border border-orange-200 bg-orange-50 px-4 py-3">
                                <p class="text-sm text-gray-700">
                                    {{ __('Your email address is unverified.') }}

                                    <button
                                        form="send-verification"
                                        class="font-semibold text-orange-600 underline hover:text-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
                                    >
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-sm font-semibold text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <button
                            type="submit"
                            class="inline-flex items-center rounded-xl bg-orange-500 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white shadow-md shadow-orange-200 transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
                        >
                            {{ __('Save') }}
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm font-semibold text-green-600"
                            >
                                {{ __('Saved.') }}
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="rounded-xl border border-orange-100 bg-white shadow-lg shadow-orange-100/60">
            <div class="border-b border-orange-100 px-6 py-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-orange-100 text-sm font-bold text-orange-600">
                        PW
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ __('Update Password') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6">
                <form method="post" action="{{ route('password.update') }}" class="space-y-5">
                    @csrf
                    @method('put')

                    <div>
                        <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700">
                            {{ __('Current Password') }}
                        </label>
                        <input
                            id="update_password_current_password"
                            name="current_password"
                            type="password"
                            autocomplete="current-password"
                            class="mt-2 block w-full rounded-xl border-gray-300 bg-orange-50/40 px-4 py-3 text-gray-900 shadow-sm transition focus:border-orange-500 focus:ring-orange-500"
                        >
                        @if ($errors->updatePassword->has('current_password'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('current_password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password" class="block text-sm font-semibold text-gray-700">
                            {{ __('New Password') }}
                        </label>
                        <input
                            id="update_password_password"
                            name="password"
                            type="password"
                            autocomplete="new-password"
                            class="mt-2 block w-full rounded-xl border-gray-300 bg-orange-50/40 px-4 py-3 text-gray-900 shadow-sm transition focus:border-orange-500 focus:ring-orange-500"
                        >
                        @if ($errors->updatePassword->has('password'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700">
                            {{ __('Confirm Password') }}
                        </label>
                        <input
                            id="update_password_password_confirmation"
                            name="password_confirmation"
                            type="password"
                            autocomplete="new-password"
                            class="mt-2 block w-full rounded-xl border-gray-300 bg-orange-50/40 px-4 py-3 text-gray-900 shadow-sm transition focus:border-orange-500 focus:ring-orange-500"
                        >
                        @if ($errors->updatePassword->has('password_confirmation'))
                            <p class="mt-2 text-sm text-red-600">{{ $errors->updatePassword->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <button
                            type="submit"
                            class="inline-flex items-center rounded-xl bg-orange-500 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white shadow-md shadow-orange-200 transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
                        >
                            {{ __('Save') }}
                        </button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm font-semibold text-green-600"
                            >
                                {{ __('Saved.') }}
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
