<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-5xl overflow-hidden">

            <!-- Wrapper: Desktop = flex | Mobile = block -->
            <div class="flex flex-col md:flex-row h-full">

                <!-- FOTO -->
                <div class="md:w-1/2 w-full relative">
                    <img src="{{ asset('img/DepanSekolah1.jpg') }}"
                        alt="Login Image"
                        class="w-full h-full md:h-auto object-cover">
                    <div class="absolute inset-0 bg-green-600 opacity-60"></div>
                </div>

                <!-- FORM -->
                <div class="md:w-1/2 w-full p-8 md:p-12 flex flex-col justify-center">
                    <div class="text-center mb-6">
                        <img src="{{ asset('img/logo_alhikmah.jpg') }}" class="w-20 mx-auto mb-3">

                        <h2 class="text-3xl font-bold text-green-600">Selamat Datang</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-1">
                            Di Sistem Informasi <br>
                            SMA AL HIKMAH MUNCAR
                        </p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-4"> @csrf <div> 
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" /> 
                    <x-text-input id="email" class="w-full bg-white border border-gray-300 rounded-lg p-2 mt-1 focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> 
                    <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                </div>
                        <div class="mt-4"> <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                         <x-text-input id="password" class="w-full bg-white border border-gray-300 rounded-lg p-2 mt-1 focus:ring-green-500 focus:border-green-500" type=" password" name="password" required autocomplete="current-password" /> 
                         <x-input-error :messages="$errors->get('password')" class="mt-2" /> </div>
                        <div class="block mt-4"> <label for="remember_me" class="inline-flex items-center"> <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span> </label>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}"> {{ __('Forgot your password?') }}</a>
                            @endif
                            <x-primary-button class="ms-3 bg-green-600"> {{ __('Log in') }}

                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>