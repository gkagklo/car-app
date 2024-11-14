{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-base-layout title="Request Password Reset" bodyClass="page-request-password-reset">

<main>
    <div class="container-small">
      <div class="flex" style="gap: 5rem">
        <div class="auth-page-form">
          <div class="text-center">
            <a href="/">
              <img src="/img/logoipsum-265.svg" alt="" />
            </a>
          </div>
          <h1 class="auth-page-title">Request Password Reset</h1>

          <!-- Session Status -->
          @if(session('status'))
          <div class="container my-large">
            <div class="success-message"> {{ session('status') }}</div>
          </div>
          @endif

          <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="email" name="email" placeholder="Your Email" />
              @error('email')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-primary btn-login w-full">
              Request password reset
            </button>

            <div class="login-text-dont-have-account">
              Already have an account? -
              <a href="{{ route('login') }}"> Click here to login </a>
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

