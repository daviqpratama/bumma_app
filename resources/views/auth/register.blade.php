<x-guest-layout>
    <div class="flex h-screen">
        <!-- Gambar (30%) -->
        <div class="w-full lg:w-[30%] h-64 lg:h-full bg-center bg-cover"
            style="background-image: url('{{ asset('images/daun.jpg') }}'); background-size: cover; background-position: center;">
        </div>

        <!-- Formulir Register (70%) -->
        <div class="w-full lg:w-[70%] p-6 flex items-center justify-center" style="height: 100vh; background-color: #E4E8D6;">
            <div class="w-full max-w-md">
                <!-- Judul -->
                <h3 class="text-center mb-2" style="color: #42563D; font-size: 3rem; font-weight: 600;">
                    DAFTAR
                </h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="flex flex-col items-start justify-center mt-4 w-full">
                        <x-text-input id="name" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Nama Lengkap" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col items-start justify-center mt-6 w-full">
                        <x-text-input id="email" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="email"
                            name="email" :value="old('email')" required autocomplete="username"
                            placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col items-start justify-center mt-6 w-full">
                        <x-text-input id="password" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="password"
                            name="password" required autocomplete="new-password"
                            placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="flex flex-col items-start justify-center mt-6 w-full">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full placeholder-[#282323]"
                            style="background-color: #DDE1CD !important; color: #282323;" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Konfirmasi Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="flex flex-col items-start justify-center mt-6 w-full">
                        <label for="role" class="block font-medium text-sm text-gray-700">Peran</label>
                        <select name="role" id="role" required
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm"
                            style="background-color: #DDE1CD !important; color: #282323;">
                            <option value="">-- Pilih Peran --</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Tombol -->
                    <div class="flex flex-col items-center justify-center mt-6">
                        <x-primary-button class="ml-1"
                            style="background-color: #637A30; width: 100%; height: 48px; color: white; text-align: center; display: flex; justify-content: center; align-items: center;">
                            Daftar
                        </x-primary-button>

                        <div class="text-center mt-4">
                            <a class="underline text-sm text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                Sudah punya akun? Masuk
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
