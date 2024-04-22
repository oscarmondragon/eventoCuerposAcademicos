<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Adjuntar comprobante de pago') }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">
                    <div id="accordion-open-body-4"" aria-labelledby="accordion-open-heading-4">
                        <form wire:submit="save">
                            @csrf
                            <div class="p-5 border border-dorado dark:border-gray-700">

                                <div class="flex sm:flex-row flex-col sm:gap-x-8 gap-y-8">
                                    <div class="basis-1/2">
                                        <h2><strong>Correo electronico registrado:</strong>
                                            {{ $this->registroFound->email }}
                                        </h2>
                                        <h2><strong>Nombre del cuerpo académico, red o grupo de investigación :</strong>
                                            {{ $this->registroFound->cuerpo_grupo_red }}</h2>
                                        <div class="mt-5">
                                            <p><strong>Datos para realizar pago:</strong></p>
                                            <div class="bg-[#003a7c] w-full h-72 rounded-xl mt-5 p-4 text-white">
                                                <h1 class="text-2xl">BBVA Bancomer</h1>
                                                <h2 class="mt-4">Nombre:
                                                    <span
                                                        class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                        Ingresos Extraordinarios Centro de Investigación en Ciencias
                                                        Biológicas Aplicadas.
                                                    </span>
                                                </h2>
                                                <h2 class="text-center mt-6">
                                                    CLABE INTERBANCARIA:
                                                    <span
                                                        class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                    </span>
                                                </h2>
                                                <h2 class="text-center mt-4">
                                                    Código Swift:
                                                    <span
                                                        class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                    </span>
                                                </h2>
                                                <div class="flex sm:flex-row flex-col justify-around mt-12">
                                                    <h2>
                                                        Cuenta:
                                                        <span
                                                            class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                            011 789 5704
                                                        </span>
                                                    </h2>
                                                    <h2>
                                                        Concepto:
                                                        <span
                                                            class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                            inscripción EICARTISSA 2024
                                                        </span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basis-1/2">
                                        <label class="block mb-2 mt-5 dark:text-white" for="boucher">Subir
                                            comprobante de pago</label>
                                        <input
                                            class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="form.boucher_help" id="boucher" type="file"
                                            accept=".jpg,.png, .pdf" wire:model.live="boucher">

                                        @error('boucher')
                                            <span class="text-rojo block">{{ $message }}</span>
                                        @enderror
                                        <div wire:loading wire:target="boucher">Cargando documento...</div>
                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                            id="form.boucher_help">
                                            <span class="font-bold">Importante:</span> Es necesario subir tu
                                            comprobante de pago para ser
                                            considerado como participante.
                                        </div>

                                        @if ($boucher != null)
                                            <div class="mt-4">
                                                <label for="checkFactura" class="label-modal">
                                                    ¿Requieres factura?<span class="font-bold text-red-600">*</span>
                                                </label>
                                                <div class="flex gap-x-5">
                                                    <div>
                                                        <input type="radio" id="checkFactura" name="checkFactura"
                                                            wire:model.live="checkFactura" value="1">
                                                        <label for="checkFactura" class="ml-2 text-textos">Si</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="checkFactura" name="checkFactura"
                                                            wire:model.live="checkFactura" value="0">
                                                        <label for="checkFactura" class="ml-2 text-textos">No</label>
                                                    </div>
                                                </div>
                                                @error('checkFactura')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        @if ($checkFactura == 1)
                                            <div class="mt-4">
                                                <label class="block mb-2 dark:text-white" for="csf">Subir
                                                    Constancia de Situación Fiscal</label>
                                                <input
                                                    class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    aria-describedby="form.csf_help" id="csf" type="file"
                                                    accept=".pdf" wire:model.live="csf">
                                                <div wire:loading wire:target="csf">Cargando
                                                    archivo...
                                                </div>
                                                @error('csf')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-end mt-5">
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
