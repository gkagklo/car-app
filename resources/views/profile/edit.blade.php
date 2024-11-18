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
            <h1 class="car-details-page-title">My Profile</h1>
            <form method="post" action="{{ route('profile.update') }}" class="card p-large my-large">
                @csrf
                @method('patch')
                <div class="form-group @error('name') has-error @enderror">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Your Name" value="{{ $user->name }}"/>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Your Email" value="{{ $user->email }}" />
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group @error('phone') has-error @enderror">
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Your Phone" value="{{ $user->phone }}"/>
                    @error('phone')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="p-medium">
                    <div class="flex justify-end gap-1">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>

            <form method="post" action="{{ route('password.update') }}" class="card p-large my-large">
                @csrf
                @method('put')
                <div class="form-group @error('current_password', 'updatePassword') has-error @enderror">
                    <label>Current Password</label>
                    <input type="password" name="current_password" placeholder="Current Password" />
                    @error('current_password', 'updatePassword')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group @error('password', 'updatePassword') has-error @enderror">
                    <label>New Password</label>
                    <input type="password" name="password" placeholder="New Password" />
                    @error('password', 'updatePassword')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat Password" />                   
                </div>
                <div class="p-medium">
                    <div class="flex justify-end gap-1">
                        <button class="btn btn-primary">Update Password</button>
                    </div>
                </div>
            </form>

        </div>
    </main>
</x-app-layout>
