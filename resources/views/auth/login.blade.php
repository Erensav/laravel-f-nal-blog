<x-guest-layout>
    <!-- Oturum Durumu -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Kullanıcı Adı -->
        <div>
            <x-input-label for="name" :value="__('Kullanıcı Adı')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Şifre -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Şifre')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Beni Hatırla -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Beni Hatırla') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Şifrenizi mi unuttunuz?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Giriş Yap') }}
            </x-primary-button>
        </div>
    </form>
    <div class="flex items-center justify-center mt-8 text-gray-600">
        {{ 'Yeni kullanıcı mısınız?     ' }}
        <a class="ml-1 underline text-sm text-blue-800 dark:text-gray-400 hover:text-violet-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('register') }}">
            {{ __('Hesap Oluştur') }}
        </a>
    </div>
</x-guest-layout>
