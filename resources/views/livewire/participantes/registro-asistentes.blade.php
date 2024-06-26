<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro asistentes') }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-4 dark:text-gray-100">
                    <div class="flex justify-center">
                        <h1 class="text-2xl font-medium">
                            Registro de asistentes
                        </h1>
                    </div>

                    <form wire:submit="save">
                        <div class="flex flex-col gap-y-5 mt-8">
                            <div class="flex lg:flex-row flex-col sm:gap-x-4 gap-y-5">
                                <div class="lg:w-2/5 w-full">
                                    <label for="nombre" class="block mb-2">
                                        Nombre(s)<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="nombre" id="nombre" wire:model.live="form.nombre"
                                        class="w-full" placeholder="Nombre(s)" />
                                    <x-input-error :messages="$errors->first('form.nombre')" class="mt-1" />
                                </div>

                                <div class="lg:w-3/5 w-full flex md:flex-row flex-col md:gap-x-4 gap-y-5">
                                    <div class="md:w-1/2 w-full">
                                        <label for="apellidoPaterno" class="block mb-2">
                                            Apellido paterno<span class="font-bold text-red-600">*</span>
                                        </label>
                                        <input type="text" name="apellidoPaterno" id="apellidoPaterno"
                                            wire:model.live="form.apellidoPaterno" class="w-full"
                                            placeholder="Apellido paterno" />
                                        <x-input-error :messages="$errors->first('form.apellidoPaterno')" class="mt-1" />
                                    </div>

                                    <div class="md:w-1/2 w-full">
                                        <label for="apellidoMaterno" class="block mb-2">
                                            Apellido materno
                                        </label>
                                        <input type="text" name="apellidoMaterno" id="apellidoMaterno"
                                            wire:model.live="form.apellidoMaterno" class="w-full"
                                            placeholder="Apellido materno" />
                                        <x-input-error :messages="$errors->first('form.apellidoMaterno')" class="mt-1" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                <div class="md:w-3/5 w-full">
                                    <label for="email" class="block mb-2">
                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                    </label>

                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4  dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 16">
                                                <path
                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                <path
                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="email" id="email" wire:model.live="form.email"
                                            class=" ps-10 p-2.5 w-full" placeholder="Correo electrónico" />
                                    </div>

                                    <x-input-error :messages="$errors->first('form.email')" class="mt-1" />
                                </div>

                                <div class="md:w-2/5 w-full">
                                    <label for="telefono" class="block mb-2">
                                        Teléfono<span class="font-bold text-red-600">*</span>
                                    </label>

                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none justify-between w-full">
                                            <div class="basis-1/4">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 19 18">
                                                    <path
                                                        d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                </svg>
                                            </div>
                                        </div>

                                        <input type="tel" name="telefono" id="telefono"
                                            wire:model.live="form.telefono" class="w-full ps-10 p-2.5 pr-14"
                                            placeholder="Teléfono" />
                                    </div>
                                    <x-input-error :messages="$errors->first('form.telefono')" class="mt-1" />
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                <div class="md:w-2/5 w-full">
                                    <label for="lugarOrigen" class="block mb-2">
                                        Lugar de origen<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="lugarOrigen" id="lugarOrigen"
                                        wire:model.live="form.lugarOrigen" class="w-full"
                                        placeholder="Lugar de origen" />
                                    <x-input-error :messages="$errors->first('form.lugarOrigen')" class="mt-1" />
                                </div>

                                <div class="md:w-3/5 w-full">
                                    <label for="dependencia" class="block mb-2">
                                        Dependencia<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="dependencia" id="dependencia"
                                        wire:model.live="form.dependencia" class="w-full"
                                        placeholder="Dependencia" />
                                    <x-input-error :messages="$errors->first('form.dependencia')" class="mt-1" />
                                </div>
                            </div>

                            <div x-data="{ otroTipo: $wire.entangle('form.tipo') }" class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                <div class="lg:w-1/4 md:w-2/5 w-full">
                                    <label for="tipo" class="block mb-2">
                                        Tipo<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <select name="tipo" id="tipo" wire:model.live="form.tipo"
                                        class="w-full">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->first('form.tipo')" class="mt-1" />
                                </div>

                                <div x-show="otroTipo == 'Otro'" class="lg:w-3/4 md:w-3/5 w-full">
                                    <label for="otroTipo" class="block mb-2">
                                        Otro<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="otroTipo" id="otroTipo"
                                        wire:model.live="form.otroTipo" class="w-full"
                                        placeholder="Describe el otro tipo">
                                    <x-input-error :messages="$errors->first('form.otroTipo')" class="mt-1" />
                                </div>
                            </div>

                            <div>
                                <label for="interes" class="block mb-2">
                                    ¿Cuál es su interes al asistir?<span class="font-bold text-red-600">*</span>
                                </label>
                                <input type="text" name="interes" id="interes" wire:model.live="form.interes"
                                    class="w-full" placeholder="Describa cual es su interes por asistir">
                                <x-input-error :messages="$errors->first('form.interes')" class="mt-1" />
                            </div>

                            <div>
                                <label for="comentario" class="block mb-2">
                                    Comentarios<span class="font-bold text-red-600">*</span>
                                </label>
                                <textarea name="comentario" id="comentario" wire:model.live="form.comentario" cols="10" rows="5"
                                    class="w-full" placeholder="Comentarios..."></textarea>
                                <x-input-error :messages="$errors->first('form.comentario')" class="mt-1" />
                            </div>

                            <div class="text-end">
                                <button type="button" class="button btn-warning">Limpiar campos</button>
                                <button type="submit" class="button btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
