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
                    <div id="accordion-open-body-4" aria-labelledby="accordion-open-heading-4">
                        <form wire:submit="save">
                            @csrf
                            <div class="p-5 border border-dorado dark:border-gray-700">
                                <div>
                                    <h2>Correo electronico registrado:
                                        <span
                                            class="font-bold underline decoration-solid underline-offset-4 decoration-2 decoration-verde">{{ $this->registroFound->email }}</span>
                                    </h2>
                                    <h2 class="mt-2">Nombre del cuerpo académico, red o grupo de
                                        investigación:
                                        <span
                                            class="font-bold underline decoration-solid underline-offset-4 decoration-2 decoration-verde block">
                                            {{ $this->registroFound->cuerpo_grupo_red }}
                                        </span>
                                    </h2>
                                </div>
                                <div class="flex sm:flex-row flex-col sm:gap-x-8 gap-y-8 items-center mt-5">
                                    <div class="basis-1/2">
                                        <div>
                                            <h1 class="font-bold">Datos para realizar pago:</h1>
                                            <div
                                                class="bg-[#003a7c] w-full sm:h-72 h-auto rounded-xl mt-5 p-4 text-white">
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
                                    <div class="basis-1/2 mt-8">
                                        <label class="block mb-2 dark:text-white" for="boucher">Subir
                                            comprobante de pago</label>
                                        <div class="bg-transparent h-10 flex items-center rounded-l-lg">
                                            <div>
                                                <input id="boucher" type="file" accept=".jpg,.png, .pdf"
                                                    wire:model.live="boucher">
                                            </div>
                                            <div class="bg-gray-200 h-10 w-full flex items-center rounded-r-md -ml-6">
                                                @empty($boucher)
                                                    <label for="boucher"
                                                        class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                        Sin archivos seleccionados.
                                                    </label>
                                                @endempty
                                                @empty(!$boucher)
                                                    <p wire:click="limpiarArchivo('boucher')"
                                                        title="Clic para quitar archivo adjuntado."
                                                        class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                        {{ $boucher->getClientOriginalName() }}
                                                    </p>
                                                @endempty
                                            </div>
                                        </div>

                                        <div wire:loading wire:target="boucher">
                                            <span class="text-sm text-textos">Cargando documento...</span>
                                        </div>
                                        @error('boucher')
                                            <span class="text-rojo block">{{ $message }}</span>
                                        @enderror
                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                            id="form.boucher_help">
                                            <span class="font-bold">Importante:</span> Es necesario subir tu
                                            comprobante de pago para ser
                                            considerado como participante.
                                        </div>

                                        @if ($boucher != null)
                                            <div class="mt-4">
                                                <label for="si" class="block mb-2 mt-5">
                                                    ¿Requieres factura?<span class="font-bold text-red-600">*</span>
                                                </label>
                                                <div class="flex gap-x-5">
                                                    <div>
                                                        <input type="radio" id="si" name="checkFactura"
                                                            wire:model.live="checkFactura" value="1">
                                                        <label for="si" class="ml-2 text-textos">Si</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="no" name="checkFactura"
                                                            wire:model.live="checkFactura" value="0"
                                                            wire:click="limpiarArchivo('csf')" />
                                                        <label for="no" class="ml-2 text-textos">No</label>
                                                    </div>
                                                </div>
                                                @error('checkFactura')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        @if ($checkFactura == 1 && $boucher != null)
                                            <div class="mt-4">
                                                <label class="block mb-2 dark:text-white" for="csf">Subir
                                                    Constancia de Situación Fiscal</label>
                                                <div class="bg-transparent h-10 flex items-center rounded-l-lg">
                                                    <div>
                                                        <input aria-describedby="form.csf_help" id="csf"
                                                            type="file" accept=".pdf" wire:model.live="csf">
                                                    </div>
                                                    <div
                                                        class="flex items-center bg-gray-200 h-10 w-full rounded-r-md -ml-6">
                                                    @empty($csf)
                                                        <label for="csf"
                                                            class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                            Sin archivos seleccionados.
                                                        </label>
                                                    @endempty
                                                @empty(!$csf)
                                                    <p wire:click="limpiarArchivo('csf')"
                                                        title="Clic para quitar archivo adjuntado."
                                                        class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                        {{ $csf->getClientOriginalName() }}</p>
                                                @endempty
                                            </div>
                                        </div>
                                        <div wire:loading wire:target="csf">
                                            <span class="text-sm text-textos">Cargando archivo...</span>
                                        </div>
                                        @error('csf')
                                            <span class="text-rojo block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-end mt-5">
                            <x-primary-button wire:loading.class="opacity-50" wire:target="save">
                                {{ __('Enviar') }}
                                <div wire:loading wire:target="save" class="sm:pl-2 pl-4">
                                    <svg aria-hidden="true"
                                        class="w-4 h-4 text-white animate-spin dark:text-gray-600 fill-black"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                </div>
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
