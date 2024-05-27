<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate(
            [
                'token' => ['required'],
                'email' => ['required', 'string', 'email', "regex:'^[^@]+@[^@]+\.[a-zA-Z]{2,}$'", 'exists:users,email'],
                'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required'],
            ],
            [
                'token.required' => 'El token es requerido.',

                'email.required' => 'El correo electrónico es requerido para poder restablecer su contraseña.',
                'email.email' => 'El correo electrónico no tiene un formato valido.',
                'email.regex' => 'El correo electrónico no tiene un formato valido.',
                'email.exists' => 'El correo electrónico no existe.',

                'password.required' => 'La contraseña es requerida.',
                'password.min' => 'La contraseña debe de tener al menos 8 caracteres.',
                'password.max' => 'La contraseña es demasiado larga.',
                'password.confirmed' => 'Las contraseñas no coinciden.',

                'password_confirmation.required' => 'Las confirmación de la contraseña es requerida.',
            ],
        );

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset($this->only('email', 'password', 'password_confirmation', 'token'), function ($user) {
            $user
                ->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])
                ->save();

            event(new PasswordReset($user));
        });

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __('Este token de restablecimiento de contraseña no es válido.'));

            return;
        }

        Session::flash('status', __('Tu contraseña ha sido restablecida.'));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div>
    <form wire:submit="resetPassword">
        <!-- Email Address -->

        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" autofocus
                autocomplete="email" placeholder="Correo electrónico" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="new-password" placeholder="Nueva contraseña" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" autocomplete="new-password"
                placeholder="Confirmar contraseña" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center sm:justify-end justify-center mt-4">
            <x-primary-button>
                {{ __('Restablecer contraseña') }}
            </x-primary-button>
        </div>
    </form>
</div>
<script>
    document.getElementById("password").oncopy = function() {
        return false;
    };

    document.getElementById("password").onpaste = function() {
        return false;
    };

    document.getElementById("password_confirmation").oncopy = function() {
        return false;
    };

    document.getElementById("password_confirmation").onpaste = function() {
        return false;
    };
</script>
