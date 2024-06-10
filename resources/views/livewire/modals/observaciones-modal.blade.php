    <div class="relative w-full h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h2 class="text-xl text-textos font-bold">
                    Motivo de rechazo
                </h2>
                <h3 class="text-textos text-lg mb-5">
                    {{ $observaciones }}
                </h3>

                <a href="{{ route('registro.revisar', $id) }}">
                    <button type="button" class="button btn-success">
                        Ver registro
                    </button>
                </a>

                <button wire:click="$dispatch('closeModal')" type="button" class="button btn-warning">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
