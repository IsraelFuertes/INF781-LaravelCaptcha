<x-guest-layout>

    @if (session('status'))

        <div class="mb-4 text-sm text-green-700">

            {{ session('status') }}

        </div>

    @endif

    <form method="POST" action="{{ route('contact.store') }}">

        @csrf

        <!-- HONEYPOT -->
        <div
            style="position:absolute; left:-9999px; top:-9999px;"
            aria-hidden="true">

            <label for="website">

                Sitio web

            </label>

            <input
                type="text"
                name="website"
                id="website"
                tabindex="-1"
                autocomplete="off">

        </div>

        <!-- NOMBRE -->
        <div>

            <x-input-label
                for="name"
                value="Nombre" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="block mt-1 w-full"
                required />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2" />

        </div>

        <!-- EMAIL -->
        <div class="mt-4">

            <x-input-label
                for="email"
                value="Correo" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="block mt-1 w-full"
                required />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        <!-- MENSAJE -->
        <div class="mt-4">

            <x-input-label
                for="message"
                value="Mensaje" />

            <textarea
                id="message"
                name="message"
                rows="5"
                class="block w-full border-gray-300 rounded-md shadow-sm"></textarea>

            <x-input-error
                :messages="$errors->get('message')"
                class="mt-2" />

        </div>

        <!-- CAPTCHA -->
        <div class="mt-4">

            <x-input-label
                for="captcha"
                value="Código de verificación" />

            <img
                src="{{ asset('images/captcha1.png') }}"
                alt="captcha"
                class="border rounded mt-1"
                style="width: 150px; height: 55px;" />

            <x-text-input
                id="captcha"
                name="captcha"
                type="text"
                class="block mt-2 w-full"
                required />

            <x-input-error
                :messages="$errors->get('captcha')"
                class="mt-2" />

        </div>

        <!-- BOTÓN -->
        <x-primary-button class="mt-4">

            Enviar

        </x-primary-button>

    </form>

</x-guest-layout>