<x-modal>
    <x-slot name="title">
        Nueva línea de generación y aplicación del conocimiento
    </x-slot>
    <x-slot name="content">
        <div>
            <div>
                <label for="nombre" class="label-modal">
                    Nombre de la línea<span class="font-bold text-red-600">*</span>
                </label>
                @if ($tipoRegistro == 1)
                    <select id="nombre" wire:model.live="nombre" class="w-full">
                        <option value="">Selecciona una opción</option>
                        @foreach ($lineasInvestigacion as $linea)
                            <option value="{{ $linea->nombre }}" title="{{ $linea->nombre }}">
                                {{ $linea->nombre }}
                            </option>
                        @endforeach
                    </select>
                @elseif($tipoRegistro == 2)
                    <input type="text" id="nombre" wire:model.live="nombre" class="input-modal"
                        placeholder="Nombre de la línea" />
                @endif
                @error('nombre')
                    <span class="text-rojo block">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="descripcion" class="label-modal">
                    Descripción<span class="font-bold text-red-600">*</span> (máximo 500 caracteres)
                </label>
                <textarea id="descripcion" rows="4" wire:model.live="descripcion" class="input-modal"
                    placeholder="Descripción de la línea..."></textarea>
                @error('descripcion')
                    <span class="text-rojo block">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </x-slot>

    <div>
        <x-slot name="buttons">
            <button wire:click="save" class="btn-success button sm:w-auto w-full">
                Guardar
            </button>
            <button wire:click="$dispatch('closeModal')" class="btn-warning button sm:w-auto w-full">
                Cancelar
            </button>
        </x-slot>
    </div>
</x-modal>
