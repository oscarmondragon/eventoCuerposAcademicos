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

                    <h1 class="text-center text-xl text-verde">
                        Resumen detallado: {{ $registro->cuerpo_grupo_red }}
                    </h1>

                    <div
                        class="w-full bg-white border border-gray-200 mt-8 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="me-2">
                                <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                    aria-controls="about" aria-selected="true"
                                    class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                    Pago
                                </button>
                            </li>
                            <li class="me-2">
                                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                                    aria-controls="services" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                    Datos generales
                                </button>
                            </li>
                            <li class="me-2">
                                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                                    aria-controls="statistics" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                    Integrantes
                                </button>
                            </li>
                            <li class="me-2">
                                <button id="pago-tab" data-tabs-target="#pago" type="button" role="tab"
                                    aria-controls="pago" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                    Banner
                                </button>
                            </li>
                        </ul>
                        <div id="defaultTabContent">
                            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                                aria-labelledby="about-tab">

                                <div>
                                    @foreach ($registro->archivos as $archivo)
                                        @if ($archivo->tipo == 'Boucher')
                                            <label class="label-titulo">Comprobante:</label>
                                            <ul class="ml-4">
                                                <li class="list-none inline-block items-center text-lg">
                                                    <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 inline-block"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                                    </svg>
                                                    Comprobante de pago
                                                    <button type="button" class="button "
                                                        wire:click="descargarArchivo('{{ $archivo->ruta }}')">
                                                        <img src="{{ asset('img/botones/btn_pdf.png') }}"
                                                            alt="Descargar archivo" class="w-6 -mb-2"
                                                            title="Descargar comprobante de pago.">
                                                    </button>
                                                </li>
                                            </ul>
                                        @elseif($archivo->tipo == 'CSF')
                                            <label class="label-titulo mt-8">Constancia de situación fiscal:</label>
                                            <ul class="ml-4">
                                                <li class="list-none inline-block items-center text-lg">
                                                    <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 inline-block"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                                    </svg>
                                                    CSF
                                                    <button type="button" class="button "
                                                        wire:click="descargarArchivo('{{ $archivo->ruta }}')">
                                                        <img src="{{ asset('img/botones/btn_pdf.png') }}" alt="hola"
                                                            class="w-6 -mb-2" title="Descargar CSF.">
                                                    </button>
                                                </li>
                                            </ul>
                                        @else
                                            <label class="label-titulo mt-8">Otros archivos:</label>
                                            <ul class="">
                                                <li class="list-none inline-block items-center text-lg">
                                                    <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 inline-block"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                                    </svg>
                                                    Otros archivos
                                                    <button type="button" class="button "
                                                        wire:click="descargarArchivo('{{ $archivo->ruta }}')">
                                                        <img src="{{ asset('img/botones/btn_pdf.png') }}" alt="hola"
                                                            class="w-6 -mb-2" title="Descargar comprobante de pago.">
                                                    </button>
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach

                                </div>

                            </div>

                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                                role="tabpanel" aria-labelledby="services-tab">

                                <div class="flex sm:flex-row flex-col sm:gap-x-5 gap-y-5">
                                    <div class="sm:w-1/4 w-full">
                                        <label class="label-titulo">Procedencia:</label>
                                        <span> {{ $registro->tipo_solicitante }}</span>
                                    </div>

                                    <div class="sm:w-3/4 w-full">
                                        <label class="label-titulo">Espacio académico:</label>
                                        <span class="sm:inline-block block sm:mt-0 mt-3">
                                            {{ $registro->espacio_procedencia }}</span>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Nombre del Cuerpo Académico, red o grupo de
                                        investigación:</label>
                                    <p> {{ $registro->cuerpo_grupo_red }}</p>
                                </div>
                                <div class="flex sm:flex-row flex-col sm:gap-x-5 gap-y-5 mt-8">
                                    <div class="sm:w-1/4 w-full">
                                        <label class="label-titulo">País:</label>
                                        <span> {{ $registro->pais }}</span>
                                    </div>
                                    <div class="sm:w-1/4 w-full">
                                        <label class="label-titulo">Teléfono:</label>
                                        <span> {{ $registro->telefono }}</span>
                                    </div>
                                    <div class="sm:w-1/2 w-full">
                                        <label class="label-titulo">Correo electrónico:</label>
                                        <span> {{ $registro->email }}</span>
                                    </div>
                                </div>

                                <div class="flex sm:flex-row flex-col items-center sm:gap-x-5 gap-y-5 mt-8">
                                    <div class="sm:w-2/5 w-full">
                                        <label class="label-titulo">Área temática:</label>
                                        <span> {{ $registro->area->area->nombre }} </span>
                                    </div>
                                    <div class="sm:w-3/5">
                                        <label class="label-titulo">Subáreas temáticas:</label>
                                        <ul class="ml-8 list-disc">
                                            @foreach ($registro->subareas as $subarea)
                                                <li>{{ $subarea->subarea->nombre }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Lineas de generación y aplicacion del
                                        conocimiento:
                                    </label>

                                    <div class="sm:w-11/12 w-full sm:mx-auto overflow-x-auto mt-5">
                                        <table class="w-full table-auto">
                                            <thead>
                                                <tr>
                                                    <th class="w-[40%]">Nombre</th>
                                                    <th class="w-[60%]">Descripción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registro->lineas as $linea)
                                                    <tr>
                                                        <td>{{ $linea->nombre }} </td>
                                                        <td>{{ $linea->descripcion }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Principales productos logrados:</label>
                                    <p> {{ $registro->productos_logrados }}</p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Casos de éxito de transferencia:</label>
                                    <p> {{ $registro->casos_exito }}</p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Proyección y propuesta de vinculación o servicios que
                                        se
                                        brindan o proyectos para posible vinculación:</label>
                                    <p> {{ $registro->servicios_proyectos }}</p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Fortalezas:</label>
                                    @foreach ($registro->fortalezasNecesidades as $fortaleza)
                                        @if ($fortaleza->tipo == 'Fortaleza')
                                            <p>{{ $fortaleza->descripcion }}</p>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Necesidades:</label>
                                    @foreach ($registro->fortalezasNecesidades as $necesidad)
                                        @if ($necesidad->tipo == 'Necesidad')
                                            <p> {{ $necesidad->descripcion }} </p>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics"
                                role="tabpanel" aria-labelledby="statistics-tab">
                                <div class="overflow-x-auto">
                                    <table class="w-full table-auto text-sm">
                                        <thead>
                                            <tr>
                                                <th class="w-[22%]">Nombre</th>
                                                <th class="w-[20%]">Grado académico</th>
                                                <th class="w-[10%]">Abreviatura</th>
                                                <th class="w-[8%]">Tipo de integrante</th>
                                                <th class="w-[7%]">Sexo</th>
                                                <th class="w-[7%]">Genero</th>
                                                <th class="w-[15%]">Correo electrónico</th>
                                                <th class="w-[11%]">Teléfono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registro->integrantes as $integrante)
                                                <tr>
                                                    <td>
                                                        {{ $integrante->nombre . ' ' . $integrante->apellido_paterno . ' ' . $integrante->apellido_materno }}
                                                    </td>
                                                    <td>{{ $integrante->grado_academico }}</td>
                                                    <td class="text-center">
                                                        {{ $integrante->grado_academico_abreviado }}</td>
                                                    <td class="text-center">
                                                        <span
                                                            @if ($integrante->tipo == 'Lider') class="integrante-lider" @elseif($integrante->tipo == 'Integrante') class="integrante" @elseif($integrante->tipo == 'Colaborador') class="integrante-colaborador" @endif>{{ $integrante->tipo }}</span>
                                                    </td>
                                                    <td>{{ $integrante->sexo }}</td>
                                                    <td>{{ $integrante->genero }}</td>
                                                    <td>{{ $integrante->email }}</td>
                                                    <td>{{ $integrante->telefono }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pago"
                                role="tabpanel" aria-labelledby="pago-tab">
                                <div>
                                    <label class="label-titulo">Institución de procedencia: </label>
                                    <p> {{ $registro->banner->espacio_procedencia }} </p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Cuerpo Académico:</label>
                                    <p> {{ $registro->banner->cuerpo_grupo_red }} </p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Área temática: </label>
                                    <p> {{ $registro->banner->area_tematica }} </p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Descripción de su principal línea de generación</label>
                                    <p> {{ $registro->banner->descripcion_linea }} </p>
                                </div>

                                <div class="mt-8">
                                    <label class="label-titulo">Integrantes</label>
                                    <div class="ml-8">
                                        <div class="mt-5">
                                            <label class="label-titulo">Lider:</label>
                                            <ul class="list-disc ml-10">
                                                @foreach ($registro->integrantes as $lider)
                                                    @if ($lider->tipo == 'Lider')
                                                        <li>
                                                            {{ $lider->grado_academico_abreviado . ' ' . $lider->nombre . ' ' . $lider->apellido_paterno . ' ' . $lider->apellido_materno }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="mt-8">
                                            <label class="label-titulo">Integrantes:</label>
                                            <ul class="list-disc ml-10">
                                                @foreach ($registro->integrantes as $integrante)
                                                    @if ($integrante->tipo == 'Integrante')
                                                        <li>
                                                            {{ $integrante->grado_academico_abreviado . ' ' . $integrante->nombre . ' ' . $integrante->apellido_paterno . ' ' . $integrante->apellido_materno }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="mt-8">
                                            <label class="label-titulo">Colaboradores:</label>
                                            <ul class="list-disc ml-10">
                                                @foreach ($registro->integrantes as $colaborador)
                                                    @if ($colaborador->tipo == 'Colaborador')
                                                        <li>
                                                            {{ $colaborador->grado_academico_abreviado . ' ' . $colaborador->nombre . ' ' . $colaborador->apellido_paterno . ' ' . $colaborador->apellido_materno }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4 mt-8">
                                    <div class="sm:w-2/5 w-full">
                                        <label class="label-titulo">Teléfono:</label>
                                        <p class="inline-block"> {{ $registro->banner->telefono }} </p>
                                    </div>

                                    <div class="sm:w-3/5 w-full">
                                        <label class="label-titulo">Correo electrónico:</label>
                                        <p class="inline-block"> {{ $registro->banner->email }} </p>
                                    </div>
                                </div>

                                <div class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4 justify-between mt-8">
                                    @if ($registro->banner->facebook != null)
                                        <div class="sm:w-1/4 w-full">
                                            <label class="label-titulo">Facebook:</label>
                                            {{ $registro->banner->facebook }}
                                        </div>
                                    @endif

                                    @if ($registro->banner->twitter != null)
                                        <div class="sm:w-1/4 w-full">
                                            <label class="label-titulo">X:</label>
                                            {{ $registro->banner->twitter }}
                                        </div>
                                    @endif

                                    @if ($registro->banner->youtube != null)
                                        <div class="sm:w-1/4 w-full">
                                            <label class="label-titulo">YouTube:</label>
                                            {{ $registro->banner->youtube }}
                                        </div>
                                    @endif

                                    @if ($registro->banner->otra_red != null)
                                        <div class="sm:w-1/4 w-full">
                                            <label class="label-titulo">Otra red:</label>
                                            {{ $registro->banner->otra_red }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-0">

                        <div class="inline-flex items-center justify-center w-full my-8">
                            <hr class="w-[800px] h-1 my-8 bg-verde/70 border-0 rounded ">
                            <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2">
                                <span class="text-verde text-lg">Cambiar estatus</span>
                            </div>
                        </div>

                        <div>
                            <form x-on:submit.prevent="confirmacion">
                                <div>
                                    <label for="estatusSelected" class="block mb-2">
                                        Estatus<span class="font-bold text-red-600">*</span>
                                    </label>

                                    {{ $estatusSelected }}
                                    <select name="estatusSelected" id="estatusSelected" wire:model="estatusSelected">
                                        <option value="0">Selecciona una opción</option>
                                        @foreach ($estatusOptions as $estatus)
                                            <option value="{{ $estatus }}">{{ $estatus }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('estatusSelected')" class="mt-1" />
                                </div>

                                <div x-data="{ estatus: $wire.entangle('estatusSelected') }">
                                    <div x-show="estatus == 'Rechazar'" class="mt-5">
                                        <label for="observaciones" class="block mb-2">
                                            Observaciones<span class="font-bold text-red-600">*</span>
                                        </label>
                                        <textarea id="observaciones" wire:model="observaciones" cols="30" rows="3"
                                            class="sm:w-3/5 w-full text-rojo font-bold" placeholder="Observaciones"></textarea>
                                        <x-input-error :messages="$errors->get('observaciones')" class="mt-1" />
                                    </div>
                                </div>

                                <div class="flex sm:flex-row flex-col sm:justify-end">
                                    <a href="{{ route('dashboard') }}">
                                        <x-secondary-button>Regresar</x-secondary-button>
                                    </a>
                                    <x-primary-button @click="confirmacion">Guardar</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmacion() {
            Swal.fire({
                customClass: {
                    title: 'swal2-title'
                },
                title: '¿Estas seguro de actualizar el estatus?',
                text: 'Al presionar confirmar se le notificará al participante el nuevo estatus de su registro via correo electrónico.',
                position: 'center',
                icon: 'warning',
                iconColor: '#9D9361',
                showCancelButton: true,
                confirmButtonColor: '#62836C',
                cancelButtonColor: '#E86562',
                confirmButtonText: 'Si, confirmar',
                cancelButtonText: 'Cerrar',

            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('save');
                }
            });
        }
    </script>
</div>
