<x-modal>
    <x-slot name="title" class="bg-verde">
        Nuevo integrante
    </x-slot>
    <x-slot name="content">
        <div>
            <div>
                <div>
                    <label for="nombre" class="label-modal">
                        Nombre<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="text" id="nombre" wire:model.live="nombre" class="input-modal" placeholder="Juan">
                    @error('nombre')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="apellidoPaterno" class="label-modal">
                        Apellido paterno<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="text" id="apellidoPaterno" wire:model.live="apellidoPaterno" class="input-modal"
                        placeholder="Beltran">
                    @error('apellidoPaterno')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="apellidoMaterno" class="label-modal">
                        Apellido materno
                    </label>
                    <input type="text" id="apellidoMaterno" wire:model.live="apellidoMaterno" class="input-modal"
                        placeholder="Hernández">
                    @error('apellidoMaterno')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>
                @if ($isLider == 1)
                    <div class="mt-4">
                        <label for="tipoLider" class="label-modal">
                            Tipo de lider<span class="font-bold text-red-600">*</span>
                        </label>
                        <select id="tipoLider" wire:model.live="tipoLider" class="w-full">
                            <option value="0">Selecciona una opción</option>
                            @foreach ($tipos_lider as $tipo)
                                <option value="{{ $tipo->id }}">
                                    {{ $tipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipoLider')
                            <span class="text-rojo block">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="mt-4">
                    <label for="gradoAcademico" class="label-modal">
                        Nombre completo del último grado académico<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="text" id="gradoAcademico" wire:model.live="gradoAcademico" class="input-modal"
                        placeholder="Licenciatura en Inteligencia Artificial">
                    @error('gradoAcademico')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="gradoAcademicoAbrev" class="label-modal">
                        Nombre abreviado del último grado académico<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="text" id="gradoAcademicoAbrev" wire:model.live="gradoAcademicoAbrev"
                        class="input-modal" placeholder="LIA">
                    @error('gradoAcademicoAbrev')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="sexo" class="label-modal">
                        Sexo<span class="font-bold text-red-600">*</span>
                    </label>
                    <div class="flex mx-auto justify-around gap-x-5">
                        <div>
                            <input type="radio" id="mujer" name="sexo" wire:model.live="sexo" value="Mujer">
                            <label for="mujer" class="ml-2 text-textos">Mujer</label>
                        </div>
                        <div>
                            <input type="radio" id="hombre" name="sexo" wire:model.live="sexo" value="Hombre">
                            <label for="hombre" class="ml-2 text-textos">Hombre</label>
                        </div>
                    </div>
                    @error('sexo')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="genero" class="label-modal">
                        Género<span class="font-bold text-red-600">*</span>
                    </label>
                    <select id="genero" class="w-full" wire:model.live="genero">
                        <option value="0">Selecciona una opción</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>

                    </select>
                    @error('genero')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="correo" class="label-modal">
                        Correo electrónico<span class="font-bold text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-textos dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="email" id="correo" wire:model.live="correo"
                            class="input-modal ps-10 p-2.5" placeholder="juanbh4@uamex.mx" />
                    </div>
                    @error('correo')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="confirmarCorreo" class="label-modal">
                        Confirmar correo electrónico<span class="font-bold text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-textos dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="email" id="confirmarCorreo" wire:model.live="confirmarCorreo"
                            class="input-modal ps-10 p-2.5" placeholder="juanbh4@uamex.mx" />
                    </div>
                    @error('confirmarCorreo')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="telefono" class="label-modal">
                        Teléfono
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-textos dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                <path
                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                            </svg>
                        </div>
                        <input type="text" id="telefono" wire:model.live="telefono"
                            class="input-modal ps-10 p-2.5" placeholder="(+52)7226490394" />
                    </div>
                    @error('telefono')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons" class="mt-2">
        <button wire:click="save" class="btn-success button sm:w-auto w-full">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="btn-warning button sm:w-auto w-full">
            Cancelar
        </button>
    </x-slot>
</x-modal>
