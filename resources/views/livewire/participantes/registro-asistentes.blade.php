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
                            <div class="flex md:flex-row flex-col md:gap-x-3">
                                <div class="w-2/5">
                                    <label for="nombre" class="block mb-2">
                                        Nombre(s)<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="nombre" id="nombre" wire:model.live="form.nombre"
                                        class="w-full" placeholder="Nombre(s)" />
                                    <x-input-error :messages="$errors->first('form.nombre')" class="mt-1" />
                                </div>

                                <div class="w-[30%]">
                                    <label for="apellidoPaterno" class="block mb-2">
                                        Apellido paterno<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="apellidoPaterno" id="apellidoPaterno"
                                        wire:model.live="form.apellidoPaterno" class="w-full"
                                        placeholder="Apellido paterno" />
                                    <x-input-error :messages="$errors->first('form.apellidoPaterno')" class="mt-1" />
                                </div>

                                <div class="w-[30%]">
                                    <label for="apellidoMaterno" class="block mb-2">
                                        Apellido materno<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="apellidoMaterno" id="apellidoMaterno"
                                        wire:model.live="form.apellidoMaterno" class="w-full"
                                        placeholder="Apellido materno" />
                                    <x-input-error :messages="$errors->first('form.apellidoMaterno')" class="mt-1" />
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                <div class="md:w-3/5 w-full">
                                    <label for="email" class="block mb-2">
                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="email" id="email" wire:model.live="form.email"
                                        class="w-full" placeholder="Correo electrónico" />
                                    <x-input-error :messages="$errors->first('form.email')" class="mt-1" />
                                </div>

                                <div class="md:w-2/5 w-full">
                                    <label for="telefono" class="block mb-2">
                                        Teléfono<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="tel" name="telefono" id="telefono" wire:model.live="form.telefono"
                                        class="w-full" placeholder="Teléfono" />
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
                                        wire:model.live="form.dependencia" class="w-full" placeholder="Dependencia" />
                                    <x-input-error :messages="$errors->first('form.dependencia')" class="mt-1" />
                                </div>
                            </div>

                            <div x-data="{ otroTipo: $wire.entangle('form.tipo') }" class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                <div class="md:w-1/4 w-full">
                                    <label for="tipo" class="block mb-2">
                                        Tipo<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <select name="tipo" id="tipo" wire:model.live="form.tipo" class="w-full">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->first('form.tipo')" class="mt-1" />
                                </div>

                                <div x-show="otroTipo == 'Otro'" class="md:w-3/4 w-full">
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
