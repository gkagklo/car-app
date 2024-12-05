<x-app-layout title="Edit Profile" bodyClass="page-edit-profile">
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
    <main>
        <div class="container-small">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="success-message"
                >{{ __('Profile updated successfully.') }}</p>
            @endif
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="success-message"
                >{{ __('Password updated successfully.') }}</p>
            @endif
            <h1 class="car-details-page-title">Profile Information</h1>
            @include('profile.partials.update-profile-information-form')
            <h1 class="car-details-page-title">Update Password</h1>
            @include('profile.partials.update-password-form')
            <h1 class="car-details-page-title">Delete Account</h1>
            @include('profile.partials.delete-user-form')
        </div>
    </main>
</x-app-layout>
