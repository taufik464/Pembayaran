<x-guest-layout>
    <div class="bg-white flex rounded-lg shadow-lg overflow-hidden w-full max-w-4xl mx-auto my-10">
        <!-- Kiri: Form Login -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <!-- Logo -->
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('img/logo_alhikmah.jpg') }}" alt="Logo" class="w-20 mb-4">
                <h2 class="text-2xl font-bold text-green-600 text-center">Selamat Datang</h2>
                <p class="text-sm text-gray-700 mt-2 font-semibold">Di Sistem Informasi</p>
                <p class="text-green-600 font-bold text-2xl">SMA AL HIKMAH MUNCAR</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="email" class="w-full bg-white border border-gray-300 rounded-lg p-2 mt-1 focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />

                    <x-text-input id="password" class="w-full bg-white border border-gray-300 rounded-lg p-2 mt-1 focus:ring-green-500 focus:border-green-500"
                        type=" password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>



                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-primary-button class="ms-3 bg-green-600">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Kanan: Gambar Sekolah -->
        <div class="w-1/2 relative">
            <img src="{{ asset('/img/HalamanSekolah.jpg') }}" alt="SMA Al Hikmah Muncar" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-green-600 opacity-60"></div>
        </div>
    </div>
</x-guest-layout>