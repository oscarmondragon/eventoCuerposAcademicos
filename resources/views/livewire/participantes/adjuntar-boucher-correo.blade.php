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

                                <h2><strong>Correo electronico registrado:</strong> {{ $this->registroFound->email }}
                                </h2>
                                <h2><strong>Nombre del cuerpo académico, red o grupo de investigación :</strong>
                                    {{ $this->registroFound->cuerpo_grupo_red }}</h2>
                                <div class="mt-5">
                                    <p><strong>Datos para realizar pago:</strong></p>
                                    <ul class="mt-3">
                                        <li><strong>Banco:</strong> BBVA Bancomer</li>
                                        <li><strong>Nombre:</strong> Ingresos Extraordinarios Centro de Investigación en
                                            Ciencias Biológicas Aplicadas</li>
                                        <li><strong>Cuenta:</strong> 0117895704</li>
                                        <li><strong>Concepto:</strong> inscripción EICARTISSA 2024</li>
                                        <li><strong>CLABE INTERBANCARIA:</strong></li>
                                        <li><strong>Código Swift:</strong></li>
                                    </ul>
                                </div>
                                <label class="block mb-2 mt-5 dark:text-white" for="boucher">Subir
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
