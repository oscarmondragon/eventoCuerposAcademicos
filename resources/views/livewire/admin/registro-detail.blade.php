<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ $id }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">
                    <hr>
                    <form wire:submit="save">
                        <select name="estatusSelected" id="estatusSelected" wire:model="estatusSelected">
                            <option value="0">Selecciona una opción</option>
                            @foreach ($estatusOptions as $estatus)
                                <option value="{{ $estatus }}">{{ $estatus }}</option>
                            @endforeach
                        </select>
                        <div>
                            @error('estatusSelected')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <textarea wire:model="observaciones" cols="30" rows="3"></textarea>

                        <div>
                            @error('observaciones')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="button btn-success" type="button">Regresar</button>
                        <button class="button btn-success" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
