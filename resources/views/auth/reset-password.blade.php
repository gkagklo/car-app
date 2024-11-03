{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

 --}}

<x-base-layout title="Password Reset" bodyClass="page-password-reset">

<main>
    <div class="container-small page-login">
      <div class="flex" style="gap: 5rem">
        <div class="auth-page-form">
          <div class="text-center">
            <a href="/">
              <img src="/img/logoipsum-265.svg" alt="" />
            </a>
          </div>
          <h1 class="auth-page-title">Request Password Reset</h1>

          <form action="{{ route('password.store') }}" method="post">
            @csrf

            <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
              <input type="email" name="email" placeholder="Your Email" />
              @error('email')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="New Password" />
                @error('password')
                <span class="text-error">{{ $message }}</span>
              @enderror
              </div>

              <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Repeat Password" />
                @error('password_confirmation')
                <span class="text-error">{{ $message }}</span>
              @enderror
              </div>

            <button class="btn btn-primary btn-login w-full">
              Reset Password
            </button>

          </form>
        </div>
        <div class="auth-page-image">
          <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
        </div>
      </div>
    </div>
  </main>

</x-base-layout>
