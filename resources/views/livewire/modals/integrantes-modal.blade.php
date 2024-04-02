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
                        Grado académico<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="text" id="gradoAcademico" wire:model.live="gradoAcademico" class="input-modal"
                        placeholder="Licenciatura en Inteligencia Artificial">
                    @error('gradoAcademico')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="gradoAcademicoAbrev" class="label-modal">
                        Grado académico abreviado<span class="font-bold text-red-600">*</span>
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
                            <input type="radio" value="Mujer" id="sexo" name="sexo" wire:model.live="sexo">
                            <span class="ml-2  text-textos">Mujer</span>
                        </div>
                        <div>
                            <input type="radio" value="Hombre" id="sexo" name="sexo" wire:model.live="sexo">
                            <span class="ml-2 text-textos">Hombre</span>
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
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>
                    @error('genero')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="correo" class="label-modal">
                        Correo electrónico<span class="font-bold text-red-600">*</span>
                    </label>
                    <input type="email" class="input-modal" id="correo" wire:model.live="correo"
                        placeholder="juanbh4@uamex.mx">
                    @error('correo')
                        <span class="text-rojo block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="telefono" class="label-modal">
                        Teléfono
                    </label>
                    <input type="text" class="input-modal" id="telefono" wire:model.live="telefono"
                        placeholder="722 456 54 43">
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
