<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <!-- EMAIL -->
        <div>

            <x-input-label
                for="email"
                :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        <!-- PASSWORD -->
        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <!-- CAPTCHA -->
        <div class="mt-4">

            <x-input-label
                for="captcha"
                :value="'Código de verificación'" />

            <div class="flex items-center gap-3 mt-1">

                <img
                    id="captcha-image"
                    src="{{ asset('images/captcha1.png') }}"
                    alt="captcha"
                    class="border rounded"
                    style="width: 150px; height: 55px;" />

                <button
                    type="button"
                    onclick="changeCaptcha()"
                    class="text-sm text-indigo-600 underline">

                    Recargar

                </button>

            </div>

            <!-- CAPTCHA CORRECTO -->
            <input
                type="hidden"
                id="captcha_expected"
                name="captcha_expected"
                value="iMKiz">

            <!-- INPUT USUARIO -->
            <x-text-input
                id="captcha"
                class="block mt-2 w-full"
                type="text"
                name="captcha"
                required
                autocomplete="off" />

            <x-input-error
                :messages="$errors->get('captcha')"
                class="mt-2" />

        </div>

        <!-- REMEMBER -->
        <div class="block mt-4">

            <label
                for="remember_me"
                class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">

                    {{ __('Remember me') }}

                </span>

            </label>

        </div>

        <!-- BOTONES -->
        <div class="flex items-center justify-end mt-4">

            @if (Route::has('password.request'))

                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">

                    {{ __('Forgot your password?') }}

                </a>

            @endif

            <x-primary-button class="ms-3">

                {{ __('Log in') }}

            </x-primary-button>

        </div>

    </form>

    <!-- SCRIPT CAPTCHA -->
    <script>

        function changeCaptcha() {

            const captchas = [

                {
                    image: '/images/captcha1.png',
                    text: 'iMKiz'
                },

                {
                    image: '/images/captcha2.png',
                    text: '5k3tC40A'
                },

                {
                    image: '/images/captcha3.png',
                    text: 'e3LJ6Jdp'
                }

            ];

            const randomCaptcha =
                captchas[Math.floor(Math.random() * captchas.length)];

            document.getElementById('captcha-image').src =
                randomCaptcha.image;

            document.getElementById('captcha_expected').value =
                randomCaptcha.text;
        }

    </script>

</x-guest-layout>