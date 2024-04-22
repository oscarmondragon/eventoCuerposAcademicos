<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Buscar registro') }}
        </h2>
    </x-slot>
    <div x-data="{ encontrado: $wire.entangle('encontradoMessage') }" class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">
                    @if (session()->has('encontrado'))
                        <div id="alert-2"
                            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">

                                <div class="alert alert-success">
                                    {{ session('encontrado') }}
                                </div>

                            </div>
                        </div>
                    @endif
                    @if (session()->has('noEncontrado'))
                        <div id="alert-2"
                            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">

                                <div class="alert alert-success">
                                    {{ session('noEncontrado') }}
                                </div>

                            </div>
                        </div>
                    @endif
                    <div id="accordion-open-body-4" aria-labelledby="accordion-open-heading-4">
                        <form wire:submit="consultar">
                            @csrf
                            <div class="p-5 border border-dorado dark:border-gray-700">

                                <label class="block mb-2 dark:text-white" for="email">Correo electrónico
                                    registrado</label>
                                <input
                                    class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="boucher_help" id="email" type="text"
                                    wire:model.live="email" placeholder="Correo electrónico">

                                @error('email')
                                    <span class="text-rojo block">{{ $message }}</span>
                                @enderror
                                <div class="text-end mt-5">
                                    <a href="{{ route('home') }}">
                                        <x-secondary-button class="ms-3">
                                            {{ __('Atras') }}
                                        </x-secondary-button>
                                    </a>
                                    <x-primary-button class="ms-3">
                                        {{ __('Enviar') }}
                                    </x-primary-button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
