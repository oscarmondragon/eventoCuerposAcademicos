<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int $contadorPassword = 0;
    public int $contadorPasswordConfirmation = 0;

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate(
                [
                    'current_password' => ['required', 'string', 'current_password'],
                    'password' => ['required', 'string', 'min:8', 'max:20', Password::defaults(), 'confirmed'],
                    'password_confirmation' => ['required'],
                ],
                [
                    'current_password.required' => 'La contraseña actual es obligatoria para poder actualizar su contraseña.',
                    'current_password.current_password' => 'La contraseña actual es incorrecta.',

                    'password.required' => 'La contraseña es obligatoria.',
                    'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                    'password.max' => 'La contraseña es demasiado larga.',
                    'password.confirmed' => 'La nueva contraseña no coincide con la confirmación de la contraseña.',

                    'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
                ],
            );
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    public function contadorCaracteres($contador, $campo)
    {
        $this->$contador = Str::of($this->$campo)->length();
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-bold text-verde dark:text-gray-100">
            {{ __('Cambiar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.') }}
        </p>
    </header>

    <x-action-message class="bg-verde/40 text-color_primary font-bold my-5 p-2 border-l-4 border-green-700"
        on="password-updated">
        {{ __('La contraseña se actualizo correctamente.') }}
    </x-action-message>

    <form wire:submit="updatePassword" class="mt-6 space-y-6" x-data="{ password: $wire.entangle('password'), passwordConfirm: $wire.entangle('password_confirmation') }">
        <div>
            <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" />
            <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password"
                type="password" class="mt-1 block w-full" autocomplete="current-password"
                placeholder="Constraseña actual" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-1" />
        </div>

        <div class="flex sm:gap-x-4 gap-y-4 md:flex-row flex-col ">
            <div class="relative basis-1/2">
                <x-input-label for="update_password_password" :value="__('Nueva contraseña')" />
                <x-text-input wire:model="password" wire:keyup="contadorCaracteres('contadorPassword', 'password')"
                    id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" placeholder="Nueva contraseña" maxlength="20" />
                <div class="flex justify-end text-sm text-textos absolute right-3 top-9" x-show="password != ''">
                    {{ $contadorPassword }}
                </div>
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="relative basis-1/2">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')" />
                <x-text-input wire:model="password_confirmation"
                    wire:keyup="contadorCaracteres('contadorPasswordConfirmation', 'password_confirmation')"
                    id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" placeholder="Confirmar contraseña"
                    maxlength="20" />
                <div class="flex justify-end text-sm text-textos absolute right-3 top-9" x-show="passwordConfirm != ''">
                    {{ $contadorPasswordConfirmation }}
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>
        </div>

        <div class="flex items-center justify-end gap-4">
            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>
        </div>
    </form>
</section>

<script>
    document.getElementById("update_password_password").oncopy = function() {
        return false;
    };

    document.getElementById("update_password_password").onpaste = function() {
        return false;
    };

    document.getElementById("update_password_password_confirmation").oncopy = function() {
        return false;
    };

    document.getElementById("update_password_password_confirmation").onpaste = function() {
        return false;
    };
</script>
