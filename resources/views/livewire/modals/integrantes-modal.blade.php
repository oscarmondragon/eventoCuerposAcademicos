<x-modal>
    <x-slot name="title" class="bg-verde">
        Nuevo integrante
    </x-slot>
    <x-slot name="content">
        <div class="w-full">

            <div class="flex-col mt-3">
                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Apellido paterno<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Apellido materno<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Grado académico<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Grado académico abreviado<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Sexo<span class="font-bold text-red-600">*</span>
                </label>
                <div class="flex mx-auto justify-around gap-x-5">
                    <div>
                        <input type="radio" id="small-input"
                            class="p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span class="ml-2">Hombre</span>
                    </div>
                    <div>
                        <input type="radio" id="small-input"
                            class="p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span class="ml-2">Mujer</span>
                    </div>
                </div>

                <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    Género<span class="font-bold text-red-600">*</span>
                </label>
                <input type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

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
