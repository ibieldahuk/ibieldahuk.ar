    <form method="POST" action="{{ route('usuario.registrar') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <input id="nombre" type="text" class="block mt-1 w-full" name="nombre" required autofocus>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <input id="correo" class="block mt-1 w-full" type="email" name="correo" required>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input id="clave" class="block mt-1 w-full" type="password" name="clave" required>
        </div>

        <div class="flex items-center justify-end mt-4">
			<button class="ms-4" type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>

