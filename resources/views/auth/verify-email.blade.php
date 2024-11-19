{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

<x-app-layout title="Verify Email" bodyClass="page-verify-email">
    <main>
        <div class="container">
            <div class="card p-large my-large">
                <h2>Verify Your Email Address</h2>
                <div class="my-medium">
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email,
                    <form method="POST" action="{{ route('verification.send') }}" class="inline-flex">
                    @csrf   
                        <button type="submit" class="btn-link">click here to request another</button>
                        .
                    </form>
                </div>
    
                <div>
                    <form class="inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
