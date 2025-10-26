<x-guest-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="font-sans text-gray-900 bg-gray-200 antialiased a relative ">
        <!-- Background Image -->
        <!-- <div class="fixed inset-0 bg-cover bg-center z-0  bg-[url('img/gambar2.png')]"></div>-->
        <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 dark:bg-gray-900 relative z-10">
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white bg-opacity-65  dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

                <div>
                    <a href="/">
                        <div class="flex justify-center items-center">
                            <x-application-logo2 class="fill-current text-gray-500" />
                        </div>
                    </a>
                </div>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
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
            </div>
        </div>
    </div>
</x-guest-layout>