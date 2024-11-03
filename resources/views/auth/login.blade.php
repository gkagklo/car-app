{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-base-layout title="Login" bodyClass="page-login">

<main>

    <div class="container-small">
      <div class="flex" style="gap: 5rem">
        <div class="auth-page-form">
          <div class="text-center">
            <a href="/">
              <img src="/img/logoipsum-265.svg" alt="" />
            </a>
          </div>
          <h1 class="auth-page-title">Login</h1>

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="email" name="email" placeholder="Your Email" />
              @error('email')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Your Password" />
              @error('password')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>
            <div class="text-right mb-medium">
              <a href="{{ route('password.request') }}" class="auth-page-password-reset"
                >Reset Password</a
              >
            </div>

            <button class="btn btn-primary btn-login w-full">Login</button>

            <div class="grid grid-cols-2 gap-1 social-auth-buttons">
              <x-google-button/>
              <x-fb-button/>
            </div>
            <div class="login-text-dont-have-account">
              Don't have an account? -
              <a href="{{ route('register') }}"> Click here to create one</a>
            </div>
          </form>
        </div>
        <div class="auth-page-image">
          <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
        </div>
      </div>
    </div>
  </main>



</x-base-layout>