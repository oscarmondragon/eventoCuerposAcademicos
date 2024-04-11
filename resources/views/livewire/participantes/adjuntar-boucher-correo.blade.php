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
                            <div class="p-5 border border-dorado dark:border-gray-700">

                                <h2>Correo electronico registrado: {{ $this->registroFound->email }}</h2>
                                <h2>Nombre del cuerpo académico, red o grupo de investigación :
                                    {{ $this->registroFound->cuerpo_grupo_red }}</h2>
                                Datos para pago:
                                Banco:
                                BBVA Bancomer
                                Nombre:
                                Ingresos Extraordinarios Centro de Investigación en Ciencias Biológicas
                                Aplicadas
                                Cuenta:
                                0117895704
                                Concepto:
                                inscripción EICARTISSA 2024
                                CLABe INTERBANCARIA:
                                Código Swift:
                                <label class="block mb-2 dark:text-white" for="boucher">Subir
                                    comprobante de pago</label>
                                <input
                                    class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="form.boucher_help" id="boucher" type="file"
                                    wire:model.live="boucher">

                                @error('boucher')
                                    <span class="text-rojo block">{{ $message }}</span>
                                @enderror
                                <div wire:loading wire:target="boucher">Uploading...</div>
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="form.boucher_help">
                                    <span class="font-bold">Importante:</span> Es necesario subir tu
                                    comprobante de pago para ser
                                    considerado como participante.
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
