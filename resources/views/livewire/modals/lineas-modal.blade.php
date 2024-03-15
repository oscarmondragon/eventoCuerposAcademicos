<x-modal>
    <x-slot name="title">
        Nueva linea de generación y aplicación del conocimiento
    </x-slot>
    <x-slot name="content">
        <div class="w-full">

            <div class="flex-col mt-3">
                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                    de la linea</label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex-col mt-6">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons" class="mt-2">
        <button wire:click="save" class="btn-success sm:w-auto w-full">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="btn-warning sm:w-auto w-full">
            Cancelar
        </button>
    </x-slot>
</x-modal>
