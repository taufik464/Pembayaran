<x-guest-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="font-sans text-gray-900 bg-gray-200 antialiased a relative ">
        <!-- Background Image -->
        <!-- <div class="fixed inset-0 bg-cover bg-center z-0  bg-[url('img/gambar2.png')]"></div>-->
        <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 dark:bg-gray-900 relative z-10">
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white bg-opacity-65  dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div class="mb-4">
                    <a href="/">
                        <div class="flex justify-center mb-4 items-center">
                            <x-application-logo2 class="fill-current text-gray-500" />
                        </div>
                    </a>
                </div>
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
            </div>
        </div>
    </div>
</x-guest-layout>