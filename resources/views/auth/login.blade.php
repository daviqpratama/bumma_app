<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex h-screen">
        <!-- Gambar (30%) - Di desktop, 100% di mobile -->
        <div class="w-full lg:w-[30%] h-64 lg:h-full bg-center bg-cover"
            style="background-image: url('{{ asset('images/daun.jpg') }}'); background-size: cover; background-position: center;">
        </div>

        <!-- Formulir Login (70%) - Di desktop, 100% di mobile -->
        <div class="w-full lg:w-[70%] p-6 flex items-center justify-center"
            style="height: 100vh; background-color: #E4E8D6;">

            <div class="w-full max-w-md">
                <!-- Teks Masuk di atas Form -->
                <h3 class="text-center mb-2" style="color: #42563D; font-size: 3rem; font-weight: 600;">
                    MASUK
                </h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="flex flex-col items-start justify-center mt-4 w-full">
                        <x-text-input id="email" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col items-start justify-center mt-6 w-full">
                        <x-text-input id="password" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="password"
                            name="password" required autocomplete="current-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <!-- Remember Me -->
                    <div class="flex items-center justify-start mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex flex-col items-center justify-center mt-4">
                        <!-- Tombol Masuk -->
                        <x-primary-button class="ml-1"
                            style="background-color: #637A30; width: 100%; height: 48px; color: white; text-align: center; display: flex; justify-content: center; align-items: center;">
                            Masuk
                        </x-primary-button>

                        <!-- Link Belum punya akun? Daftar di bawah tombol -->
                        <div class="text-center mt-4">
                            <a class="underline text-sm text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('register') }}">
                                Belum punya akun? Daftar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
