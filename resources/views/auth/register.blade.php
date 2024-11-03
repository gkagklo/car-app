{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-base-layout title="SignUp" bodyClass="page-signup">

<main>
    <div class="container-small">
      <div class="flex" style="gap: 5rem">
        <div class="auth-page-form">
          <div class="text-center">
            <a href="/">
              <img src="/img/logoipsum-265.svg" alt="" />
            </a>
          </div>
          <h1 class="auth-page-title">Signup</h1>

          <form action="{{ route('register')}}" method="post">
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
            <div class="form-group">
              <input type="password" name="password_confirmation" placeholder="Repeat Password" />
              @error('password_confirmation')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>
            <hr />
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" />
                @error('name')
                <span class="text-error">{{ $message }}</span>
              @enderror
              </div>
            <div class="form-group">
              <input type="text" name="phone" placeholder="Phone" />
              @error('phone')
                <span class="text-error">{{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-login w-full">Register</button>

            <div class="grid grid-cols-2 gap-1 social-auth-buttons">
              <x-google-button/>
              <x-fb-button/>             
            </div>
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
