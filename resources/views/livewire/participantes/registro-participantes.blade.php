<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro participantes') }}
        </h2>
    </x-slot>
    <div x-data="{ integrantes: $wire.entangle('form.integrantes'), lideres: $wire.entangle('form.lideres'), tipoRegistro: $wire.entangle('form.tipoRegistro'), cuerpoAcademico: $wire.entangle('form.nombreGrupo'), integrantesSeccion: false, alertaLink: false }" class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-4 dark:text-gray-100">
                    <div id="alert-1" :class="{ 'hidden': alertaLink == true }"
                        class="flex items-center p-4 text-color_primary rounded-lg bg-verde/40 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            <div>
                                <span class="font-medium"> Sugerencias para la captura:</span>
                                <ul class="mt-1.5 list-disc list-inside">
                                    <li>¡Prepara tu información con antelación!</li>
                                    <li>Asegúrate de tener a mano cualquier documento o referencia relevante.</li>
                                    <li>Los campos con <span class="text-rojo">*</span> son obligatorios.</li>
                                    <li>El formulario esta dividido por secciones, asegurate de completarlas.</li>
                                    <li>Al concluir la captura de <span class="font-bold">TODOS</span> los datos
                                        obligatorios debes darle enviar para
                                        guardar tu registro.</li>
                                </ul>
                            </div>
                        </div>
                        <button type="button" x-on:click="alertaLink = true"
                            class="btn-transition ms-auto -mx-1.5 -my-1.5 bg-verde/60 text-color_primary rounded-lg focus:ring-2 focus:ring-verde p-1.5 hover:bg-verde inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    <form wire:submit="save">
                        @csrf
                        <div>
                            <div class="mt-2">
                                <div id="accordion-open" data-accordion="open">
                                    <h2 id="accordion-open-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium bg-blanco rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-1 focus:ring-gray-300 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3
                                            btn-accot"
                                            data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                                            aria-controls="accordion-open-body-1">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Datos generales</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-1" aria-labelledby="accordion-open-heading-1">
                                        <div class="p-5 border border-t-0 border-dorado/60 dark:border-gray-700">
                                            <div class="flex md:flex-row flex-col md:items-end md:gap-x-5 gap-y-5">
                                                <div class="basis-1/4">
                                                    <label for="form.tipoRegistro" class="block mb-2 dark:text-white">
                                                        Selecciona procedencia<span
                                                            class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select id="form.tipoRegistro" wire:model.live="form.tipoRegistro"
                                                        class="w-full" wire:change="limpiarCamposProcedencia">
                                                        <option value="0" selected disabled>Selecciona una opción
                                                        </option>
                                                        <option value="1">Cuerpo académico UAEMéx</option>
                                                        <option value="2">Externo a la UAEMéx</option>
                                                        <option value="3">Red de investigación UAEMéx</option>

                                                    </select>
                                                    @error('form.tipoRegistro')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                @if ($form->tipoRegistro == 0 || $form->tipoRegistro == 1 || $form->tipoRegistro == 3)
                                                    <div class="basis-3/4">
                                                        <label for="form.lugarProcedencia"
                                                            class="block mb-2 dark:text-white">
                                                            Espacio académico<span
                                                                class="font-bold text-red-600">*</span>
                                                        </label>
                                                        <select name="form.lugarProcedencia" id="form.lugarProcedencia"
                                                            wire:model.live="form.lugarProcedencia"
                                                            class="w-full h-10 disabled"
                                                            @if ($form->tipoRegistro == 0) disabled title="Debes de seleccionar la procedencia." @endif
                                                            @change="$wire.espacioAcademicoId($event.target.selectedOptions[0].getAttribute('data-espacio-academico-id'))">
                                                            <option value="null" selected disabled
                                                                data-espacio-academico-id="0">
                                                                Selecciona una opción</option>
                                                            @foreach ($espaciosAcademicos as $espacioAcademico)
                                                                <option value="{{ $espacioAcademico->nombre }}"
                                                                    data-espacio-academico-id="{{ $espacioAcademico->id }}">
                                                                    {{ $espacioAcademico->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.lugarProcedencia')
                                                            <span class="text-rojo block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @elseif($form->tipoRegistro == 2)
                                                    <div class="basis-3/4">
                                                        <label for="form.lugarProcedencia"
                                                            class="block mb-2 dark:text-white">
                                                            Nombre completo de la universidad, dependencia o
                                                            departamento de
                                                            adscripción<span class="font-bold text-red-600">*</span>
                                                        </label>
                                                        <input type="text" id="form.lugarProcedencia" class="w-full"
                                                            wire:model.live="form.lugarProcedencia"
                                                            wire:change="updateLugarProcedenciaBanner"
                                                            placeholder="Universidad Autónoma del Estado de México">
                                                        @error('form.lugarProcedencia')
                                                            <span class="text-rojo block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="mt-5">
                                                <label for="form.nombreGrupo" class="block mb-2 dark:text-white">
                                                    Nombre del Cuerpo Académico, red o grupo de investigación<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                @if ($form->tipoRegistro == 0 || $form->tipoRegistro == 1)
                                                    <div>
                                                        <select name="form.nombreGrupo" id="form.nombreGrupo"
                                                            wire:model.live="form.nombreGrupo"
                                                            class="w-full h-10 disabled"
                                                            @if ($form->lugarProcedencia == null || $form->lugarProcedencia == 0) disabled title="Selecciona el espacio academico." @endif
                                                            @change="$wire.cuerpoAcademicoId($event.target.selectedOptions[0].getAttribute('data-cuerpo-academico-id'))">
                                                            <option value="null" selected disabled
                                                                data-cuerpo-academico-id="0">
                                                                Selecciona una opción</option>
                                                            @foreach ($cuerposAcademicos as $cuerpoAcademico)
                                                                <option value="{{ $cuerpoAcademico->nombre }}"
                                                                    data-cuerpo-academico-id="{{ $cuerpoAcademico->id }}">
                                                                    {{ $cuerpoAcademico->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @elseif($form->tipoRegistro == 2 || $form->tipoRegistro == 3)
                                                    <div>
                                                        <input type="text" id="form.nombreGrupo"
                                                            class="w-full disabled"
                                                            @if ($form->lugarProcedencia == null) disabled title="Selecciona el espacio academico." @endif
                                                            placeholder="Desarrollo sociocultural de México"
                                                            wire:model.live="form.nombreGrupo"
                                                            wire:change="updateCuerpoAcadBanner" />
                                                    </div>
                                                @endif

                                                @error('form.nombreGrupo')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4 mt-5">
                                                <div class="flex-initial md:w-3/5 sm:1/2 w-full">
                                                    <label for="form.pais" class="block mb-2 dark:text-white">
                                                        País procedente<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select id="form.pais" wire:model.live="form.pais"
                                                        class="w-full">
                                                        <option value="" disabled>Selecciona un país</option>
                                                        @foreach ($paises as $pais)
                                                            <option value="{{ $pais->nombre }}">{{ $pais->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.pais')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial md:w-2/5 sm:1/2 w-full">
                                                    <label for="telefonoGeneral" class="block mb-2 dark:text-white">
                                                        Teléfono<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <div class="relative">

                                                        <div
                                                            class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none justify-between w-full">
                                                            <div class="basis-1/4">
                                                                <svg class="w-4 h-4 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 19 18">
                                                                    <path
                                                                        d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                                </svg>
                                                            </div>

                                                            <div class="text-sm mr-2">
                                                                {{ $contadorTelefono }} / {{ $contadorTelefonoMax }}
                                                            </div>
                                                        </div>

                                                        <input type="text" id="telefonoGeneral"
                                                            wire:model.live="form.telefonoGeneral"
                                                            wire:change="updateTelefonoBanner"
                                                            class="w-full ps-10 p-2.5 pr-14" {{-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" --}}
                                                            placeholder="(+52)7226490394" />
                                                    </div>
                                                    @error('form.telefonoGeneral')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="flex md:flex-row flex-col md:gap-x-4 gap-y-4 mt-5">
                                                <div class="flex-initial md:w-1/2 w-full">
                                                    <label for="form.correoGeneral"
                                                        class="block mb-2 dark:text-white">
                                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4  dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 16">
                                                                <path
                                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                                <path
                                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                            </svg>
                                                        </div>
                                                        <input type="email" id="form.correoGeneral"
                                                            wire:model.live="form.correoGeneral"
                                                            wire:change="updateCorreoBanner"
                                                            class="w-full ps-10 p-2.5" placeholder="uaemex@uaemex.mx"
                                                            autocomplete="off" />
                                                    </div>
                                                    <p class="text-sm text-textos ml-1">
                                                        <span class="font-bold">Nota: </span>
                                                        Este correo electrónico será el identificador del registro y el
                                                        principal medio de contacto.
                                                    </p>

                                                    @error('form.correoGeneral')
                                                        <span
                                                            class="text-rojo block -mt-1 ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial md:w-1/2 w-full">
                                                    <label for="form.correoGeneralConfirmacion"
                                                        class="block mb-2 dark:text-white">
                                                        Confirmar correo electrónico<span
                                                            class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4  dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 16">
                                                                <path
                                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                                <path
                                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                            </svg>
                                                        </div>
                                                        <input type="email" id="form.correoGeneralConfirmacion"
                                                            wire:model.live="form.correoGeneralConfirmacion"
                                                            wire:change="updateCorreoBanner"
                                                            class="w-full ps-10 p-2.5" placeholder="uaemex@uaemex.mx"
                                                            autocomplete="off" />
                                                    </div>
                                                    @error('form.correoGeneralConfirmacion')
                                                        <span class="text-rojo block ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <p class="block mb-2 dark:text-white">
                                                    Selecciona un área tematica y automaticamente se listaran las
                                                    subáreas disponibles para seleccionar<span
                                                        class="font-bold text-red-600">*</span>
                                                </p>
                                            </div>
                                            <div class="flex md:flex-row flex-col  gap-x-4 bg-[#34778A]/30 rounded-lg">
                                                <div class="flex-initial md:w-1/4 w-full rounded-l-lg px-4 py-5">
                                                    <label for="form.areaSeleccionada"
                                                        class="block mb-2 font-bold dark:text-white">
                                                        Área temática<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    {{-- <ul class="pl-4">
                                                        @foreach ($areasOptions as $area)
                                                            <li wire:click="actualizarAreasSeleccionadas({{ $area }})"
                                                                class="cursor-pointer text-textos hover:bg-[#34778A]/80 focus:bg-red-500 hover:text-white hover:font-bold {{ $area->id == $areaSeleccionada ? 'bg-[#34778A]/80' : 'bg-transparent' }}">
                                                                {{ $area->nombre }}
                                                            </li>
                                                        @endforeach
                                                    </ul> --}}
                                                    <select id="form.areaSeleccionada"
                                                        wire:model.live="form.areaSeleccionada"
                                                        wire:change="limpiarSubareas"
                                                        class="w-full border border-gray-300 hover:bg-[#34778A]/40">
                                                        <option value="null" disabled>Selecciona una opción</option>
                                                        @foreach ($areasOptions as $area)
                                                            <option value="{{ $area->id }}">
                                                                {{ $area->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.areaSeleccionada')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial md:w-3/4 w-full bg-gray-100 px-4 py-4">
                                                    <p class="block mb-2 dark:text-white">
                                                        Subárea temática<span class="font-bold text-red-600">*</span>
                                                    </p>
                                                    <div>
                                                        <div class="flex flex-col">
                                                            @foreach (collect($subareasOptions)->groupBy('grupo.nombre') as $grupo => $subareasDelGrupo)
                                                                <h1 class="text-verde font-bold">
                                                                    {{ $grupo }}
                                                                </h1>
                                                                <ul>
                                                                    @foreach ($subareasDelGrupo as $subarea)
                                                                        <li wire:click="selectSubareaOption({{ $subarea }})"
                                                                            class="hover:bg-[#34778A]/30 hover:text-black cursor-pointer flex items-center"
                                                                            :class="{ 'bg-dorado/30': {{ array_search($subarea['id'], array_column($this->selectedSubareas, 'id')) !== false ? 'true' : 'false' }} }">
                                                                            {{ $subarea->nombre }}
                                                                            @if (array_search($subarea['id'], array_column($this->selectedSubareas, 'id')) !== false)
                                                                                <span class="ml-2 font-bold">✓</span>
                                                                            @else
                                                                                <span
                                                                                    class="w-3 h-3 bg-gray-100 border-2 border-black ml-2"></span>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('form.subareasSeleccionadas')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror

                                            @if (count($selectedSubareas) > 0)
                                                <div class="mt-5 sm:ml-8 ml-4">
                                                    <h2 class="text-lg font-medium text-verde">
                                                        Subareas seleccionadas:
                                                    </h2>
                                                    <ul class="list-disc">
                                                        @foreach ($selectedSubareas as $subarea)
                                                            <li
                                                                class="sm:ml-12 ml-8 underline underline-offset-4 decoration-1 decoration-verde pt-2">
                                                                {{ $subarea['area'] }} <span
                                                                    class="text-verde">&#10142;</span>
                                                                {{ $subarea['grupo'] }} <span
                                                                    class="text-verde">&#10142;</span>
                                                                <span
                                                                    class="font-bold">{{ $subarea['nombre'] }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p class="text-dorado text-sm mt-2"><span class="font-bold">Nota:
                                                        </span>Para quitar una subárea dar clic en la palomita que
                                                        aparece enfrente de la subárea cuando la seleccionaste.</p>
                                                </div>
                                            @endif

                                            <div class="mt-5">
                                                <div class="flex items-center">
                                                    <p>Lineas de generación y aplicacion del
                                                        conocimiento<span class="font-bold text-red-600 mr-2">*</span>
                                                    </p>
                                                    <button type="button" id="btnLineas"
                                                        x-bind:disabled="tipoRegistro < 1 || cuerpoAcademico == null ||
                                                            cuerpoAcademico == ''"
                                                        :class="{
                                                            'disabled:bg-[#e0dddd]': tipoRegistro < 1 ||
                                                                cuerpoAcademico == null ||
                                                                cuerpoAcademico == ''
                                                        }"
                                                        class="btn-redondo"
                                                        @if ($form->tipoRegistro < 1) title="Debes seleccionar la procedencia en la sección de datos generales."
                                                        @elseif($form->nombreGrupo == null || $form->nombreGrupo == '') title="Debes de completar el campo: Nombre del Cuerpo Académico, red o grupo de investigación." @endif
                                                        @click="$wire.dispatch('openModal', {component: 'modals.lineas-modal', arguments: { tipoRegistro: {{ $form->tipoRegistro }}, idCuerpo: '{{ $form->idCuerpoAcademico }}' }})">
                                                        +
                                                    </button>
                                                </div>
                                                @error('form.lineasInvestigacion')
                                                    <span class="text-rojo block mt-2">{{ $message }}</span>
                                                @enderror
                                                <div x-data="{ elementos: $wire.entangle('form.lineasInvestigacion') }" x-show="elementos.length > 0 "
                                                    class="overflow-x-auto mt-5">
                                                    <table
                                                        class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                        <thead>
                                                            <tr class="bg-blanco">
                                                                <th class="w-[30%]">Nombre de la línea</th>
                                                                <th class="w-[60%]">Descripción</th>
                                                                <th class="w-[10%]">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <template x-for="(elemento, index) in elementos"
                                                                :key="index">
                                                                <tr
                                                                    class="border border-b-gray-200 border-transparent">
                                                                    <td x-text="elemento.nombre"></td>
                                                                    <td x-text="elemento.descripcion"></td>
                                                                    <td
                                                                        class="flex sm:flex-row flex-col sm:gap-x-5 gap-y-3 mx-auto">
                                                                        <div class="flex">
                                                                            <button type="button"
                                                                                class="btn-tablas btn-transition"
                                                                                @click="$wire.dispatch('openModal', { component: 'modals.lineas-modal', arguments: { _id: elemento._id, nombre: elemento.nombre, descripcion: elemento.descripcion, tipoRegistro, idCuerpo: '{{ $form->idCuerpoAcademico }}' }})">
                                                                                <img src="{{ asset('/img/botones/btn_editar.png') }}"
                                                                                    alt="Image/png" title="Editar">
                                                                            </button>
                                                                        </div>
                                                                        <div class="flex">
                                                                            <button type="button"
                                                                                @click.stop="elementos.splice(index, 1); $wire.deleteLinea(elemento)"
                                                                                class="btn-tablas btn-transition">
                                                                                <img src="{{ asset('img/botones/btn_eliminar.png') }}"
                                                                                    alt="Botón eliminar"
                                                                                    title="Eliminar">
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div x-data="{ lineaExistente: $wire.entangle('lineaExistenteMessage') }">
                                                    <div class="flex flex-row-reverse items-center mt-5"
                                                        x-show="lineaExistente != null">
                                                        <div id="alert-11"
                                                            class="flex items-center sm:w-3/5 w-full p-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                                                            role="alert">
                                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                            </svg>
                                                            <span class="sr-only">Info</span>
                                                            <div class="ms-3 text-sm font-medium">
                                                                Advertencia: {{ $lineaExistenteMessage }}
                                                            </div>
                                                            <button type="button"
                                                                class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                                                                data-dismiss-target="#alert-11" aria-label="Close">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-data="{
                                                contadorProductos: $wire.entangle('contadorProductos'),
                                                contadorCasos: $wire.entangle('contadorCasosExito'),
                                                contadorPropuestas: $wire.entangle('contadorPropuestas'),
                                                contadorFortalezas: $wire.entangle('contadorFortalezas'),
                                                contadorNecesidades: $wire.entangle('contadorNecesidades')
                                            }">
                                                <div class="mt-7">
                                                    <label for="form.productosLogrados"
                                                        class="block mb-2 dark:text-white">
                                                        Principales productos logrados<span
                                                            class="font-bold text-red-600">*</span> (máximo 500
                                                        caracteres)
                                                    </label>
                                                    <textarea id="form.productosLogrados" rows="4" wire:model.live="form.productosLogrados" class="w-full"
                                                        placeholder="Principales productos logrados..."></textarea>
                                                    <div class="flex justify-between">
                                                        <div class ="w-10/12">
                                                            @error('form.productosLogrados')
                                                                <span
                                                                    class="text-rojo block sm:text-base text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <p class="sm:text-sm text-xs font-bold"
                                                                :class="{
                                                                    'text-rojo': contadorProductos > 500
                                                                }">
                                                                {{ $contadorProductos }} / 500
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <label for="form.casosExito"
                                                        class="block mb-2 mt-2 dark:text-white">
                                                        Casos de éxito de transferencia<span
                                                            class="font-bold text-red-600">*</span> (máximo 500
                                                        caracteres)
                                                    </label>
                                                    <textarea id="form.casosExito" rows="4" wire:model.live="form.casosExito" class="w-full"
                                                        placeholder="Casos de éxito..."></textarea>
                                                    <div class="flex justify-between">
                                                        <div class ="w-10/12">
                                                            @error('form.casosExito')
                                                                <span
                                                                    class="text-rojo block sm:text-base text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <p class="sm:text-sm text-xs font-bold"
                                                                :class="{
                                                                    'text-rojo': contadorCasos > 500
                                                                }">
                                                                {{ $contadorCasosExito }} / 500
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <label for="form.propuestas"
                                                        class="block mb-2 mt-2 dark:text-white">
                                                        Proyección y propuesta de vinculación o servicios que se brindan
                                                        o
                                                        proyectos para posible vinculación<span
                                                            class="font-bold text-red-600">*</span> (máximo 500
                                                        caracteres)
                                                    </label>
                                                    <textarea id="form.propuestas" rows="4" wire:model.live="form.propuestas" class="w-full"
                                                        placeholder="Proyección y propuesta de vinculación..."></textarea>
                                                    <div class="flex justify-between">
                                                        <div class ="w-10/12">
                                                            @error('form.propuestas')
                                                                <span
                                                                    class="text-rojo block sm:text-base text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <p class="sm:text-sm text-xs font-bold"
                                                                :class="{
                                                                    'text-rojo': contadorPropuestas > 500
                                                                }">
                                                                {{ $contadorPropuestas }} / 500
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex md:flex-row flex-col md:gap-x-4 gap-y-4 mt-5">
                                                    <div class="basis-1/2">
                                                        <label for="form.fortalezas"
                                                            class="block mb-2 mt-2 dark:text-white">
                                                            Fortalezas<span class="font-bold text-red-600">*</span>
                                                            (máximo
                                                            500 caracteres)
                                                        </label>
                                                        <textarea id="form.fortalezas" rows="4" wire:model.live="form.fortalezas" class="w-full"
                                                            placeholder="Fortalezas..."></textarea>
                                                        <div class="flex justify-between">
                                                            <div class ="w-10/12">
                                                                @error('form.fortalezas')
                                                                    <span
                                                                        class="text-rojo block sm:text-base text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div>
                                                                <p class="sm:text-sm text-xs font-bold"
                                                                    :class="{
                                                                        'text-rojo': contadorFortalezas > 500
                                                                    }">
                                                                    {{ $contadorFortalezas }} / 500
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="basis-1/2">
                                                        <label for="form.necesidades"
                                                            class="block mb-2 mt-2 dark:text-white">
                                                            Necesidades<span class="font-bold text-red-600">*</span>
                                                            (máximo 500 caracteres)
                                                        </label>
                                                        <textarea id="form.necesidades" rows="4" wire:model.live="form.necesidades" class="w-full"
                                                            placeholder="Necesidades..."></textarea>
                                                        <div class="flex justify-between">
                                                            <div class="w-10/12">
                                                                @error('form.necesidades')
                                                                    <span
                                                                        class="text-rojo block sm:text-base text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div>
                                                                <p class="sm:text-sm text-xs font-bold"
                                                                    :class="{
                                                                        'text-rojo': contadorNecesidades > 500
                                                                    }">
                                                                    {{ $contadorNecesidades }} / 500
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium bg-blanco rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-1 focus:ring-gray-300 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                                            aria-controls="accordion-open-body-2">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>Integrantes</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-2"
                                        :class="{
                                            'hidden': integrantes.length < 1 && lideres.length < 1 &&
                                                integrantesSeccion == false
                                        }"
                                        aria-labelledby="accordion-open-heading-2">
                                        <div class="p-5 border border-b-0 border-dorado/60 dark:border-gray-700">
                                            <div class="flex md:flex-row flex-col gap-6">
                                                <div class="flex-initial w-full">
                                                    <div class="flex items-end">
                                                        <p class="block mb-2 dark:text-white">
                                                            Líder<span class="font-bold text-red-600">*</span>
                                                        </p>
                                                        <button type="button" id="btnLider"
                                                            x-bind:disabled="lideres.length > 0 || tipoRegistro < 1"
                                                            @if ($form->tipoRegistro < 1)
                                                            title="Debes seleccionar la procedencia en la sección de datos generales."
                                                        @elseif(count($form->lideres) > 0)
                                                            title="Solo se puede agregar un líder."
                                                            @endif
                                                            :class="{
                                                                'disabled:bg-[#e0dddd]': lideres.length > 0 ||
                                                                    tipoRegistro < 1
                                                            }"
                                                            class="btn-redondo ml-2"
                                                            @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: {
                                                                tipoRegistro: {{ $form->tipoRegistro }}, isLider: 1
                                                            }})">
                                                            +
                                                        </button>
                                                    </div>
                                                    <div class="overflow-x-auto mt-5">
                                                        <div x-show="lideres.length > 0">
                                                            <table
                                                                class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                                <thead>
                                                                    <tr class="bg-blanco">
                                                                        <th class="w-[85%]">Nombre del líder</th>

                                                                        <th class="w-[15%]">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <template x-for="(lider, index) in lideres"
                                                                        :key="index">
                                                                        <tr
                                                                            class="border border-b-gray-200 border-transparent ">
                                                                            <td
                                                                                x-text="lider.nombre + ' ' + lider.apellidoPaterno + ' ' + lider.apellidoMaterno">
                                                                            </td>
                                                                            <td
                                                                                class="flex md:flex-row flex-col md:gap-x-2 gap-y-2">
                                                                                <div>
                                                                                    <button type="button"
                                                                                        class="btn-transition btn-tablas"
                                                                                        @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: { 
                                                                                        _id: lider._id, 
                                                                                        nombre: lider.nombre, 
                                                                                        apellidoPaterno: lider.apellidoPaterno,  
                                                                                        apellidoMaterno: lider.apellidoMaterno,
                                                                                        tipoLider: lider.tipoLider,
                                                                                        gradoAcademico: lider.gradoAcademico, 
                                                                                        gradoAcademicoAbrev: lider.gradoAcademicoAbrev, 
                                                                                        sexo: lider.sexo, 
                                                                                        genero: lider.genero, 
                                                                                        correo: lider.correo, 
                                                                                        confirmarCorreo: lider.correo,
                                                                                        telefono: lider.telefono, 
                                                                                        tipoRegistro: {{ $form->tipoRegistro }},
                                                                                        isLider: 1
                                                                                    }})">
                                                                                        <img src="{{ asset('/img/botones/btn_editar.png') }}"
                                                                                            alt="Image/png"
                                                                                            title="Editar">
                                                                                    </button>
                                                                                </div>
                                                                                <div>
                                                                                    <button type="button"
                                                                                        @click.stop="lideres.splice(index, 1); $wire.deleteLinea(lider)"
                                                                                        class="btn-transition">
                                                                                        <img src="{{ asset('img/botones/btn_eliminar.png') }}"
                                                                                            alt="Botón eliminar"
                                                                                            title="Eliminar">
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </template>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        @error('form.lideres')
                                                            <span class="text-rojo block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="flex-initial w-full">
                                                    <div class="flex items-center">
                                                        <select id="tipoIntegrante" name="tipoIntegrante"
                                                            wire:model.live="tipoIntegrante"
                                                            x-on:change="integrantesSeccion = true"
                                                            wire:change="validarTipoIntegrante"
                                                            class="w-auto h-9 text-sm">
                                                            <option value="Integrante" selected>Integrante</option>
                                                            <option value="Colaborador">Colaborador</option>

                                                        </select>
                                                        <button type="button" id="btnIntegrantes"
                                                            class="btn-redondo ml-2"
                                                            @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: {
                                                                tipoRegistro: {{ $form->tipoRegistro }}, isLider: 0, tipoIntegrante: '{{ $tipoIntegrante }}'
                                                            }})">
                                                            +
                                                        </button>
                                                    </div>

                                                    <div x-show="integrantes.length > 0 "
                                                        class ="overflow-x-auto mt-5">
                                                        <table
                                                            class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-[50%]">Nombre de los integrantes</th>
                                                                    <th class="w-[35%]">Tipo</th>
                                                                    <th class="w-[15%]">Acción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <template x-for="(integrante, index) in integrantes"
                                                                    :key="index">
                                                                    <tr
                                                                        class="border border-b-gray-200 border-transparent ">
                                                                        <td
                                                                            x-text="integrante.nombre + ' ' + integrante.apellidoPaterno + ' ' + integrante.apellidoMaterno">
                                                                        </td>
                                                                        <td x-text="integrante.tipoIntegrante">
                                                                        </td>
                                                                        <td
                                                                            class="flex md:flex-row flex-col items-center md:gap-x-2 gap-y-2">
                                                                            <div>
                                                                                <button type="button"
                                                                                    class="button btn-tablas"
                                                                                    @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: { 
                                                                                        _id: integrante._id, 
                                                                                        nombre: integrante.nombre, 
                                                                                        apellidoPaterno: integrante.apellidoPaterno,  
                                                                                        apellidoMaterno: integrante.apellidoMaterno,
                                                                                        tipoIntegrante: integrante.tipoIntegrante,
                                                                                        gradoAcademico: integrante.gradoAcademico, 
                                                                                        gradoAcademicoAbrev: integrante.gradoAcademicoAbrev, 
                                                                                        sexo: integrante.sexo, 
                                                                                        genero: integrante.genero, 
                                                                                        correo: integrante.correo,
                                                                                        confirmarCorreo: integrante.correo,
                                                                                        telefono: integrante.telefono, 
                                                                                        tipoRegistro: {{ $form->tipoRegistro }},
                                                                                        isLider: 0
                                                                                    }})">
                                                                                    <img src="{{ asset('/img/botones/btn_editar.png') }}"
                                                                                        alt="Image/png"
                                                                                        title="Editar">
                                                                                </button>
                                                                            </div>
                                                                            <div>
                                                                                <button type="button"
                                                                                    @click.stop="integrantes.splice(index, 1); $wire.deleteLinea(integrante)"
                                                                                    class="button btn-tablas">
                                                                                    <img src="{{ asset('img/botones/btn_eliminar.png') }}"
                                                                                        alt="Botón eliminar"
                                                                                        title="Eliminar">
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </template>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @error('form.integrantes')
                                                        <span class="text-rojo block mt-5">{{ $message }}</span>
                                                    @enderror
                                                    @error('tipoIntegrante')
                                                        <span class="text-rojo block mt-5">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right bg-blanco text-gray-500 border border-gray-200 focus:ring-1 focus:ring-gray-300 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                                            aria-controls="accordion-open-body-3">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>Banner: Estos datos serán utilizados para imprimirlos en la lona
                                                del networking y
                                                para formar un directorio</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-3" class="hidden" x-data="{ email: $wire.entangle('form.correoBanner') }"
                                        :class="{ 'hidden': email == '' }" aria-labelledby="accordion-open-heading-3">
                                        <div class="p-5 border border-t-0 border-dorado/60 dark:border-gray-700">
                                            <div id="alert-88"
                                                class="flex  items-center p-4  text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                                role="alert">
                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div class="ms-3 text-sm font-medium">
                                                    <span class="font-extrabold">Importante:</span>
                                                    Esta información es una copia de los campos capturados en la
                                                    sección 'Datos generales'. Favor de revisar la ortografía y
                                                    puntuación, ya que
                                                    esta información
                                                    será utilizada para las lonas de los banners. Así mismo, agregar
                                                    sus redes sociales si lo consideran necesario.
                                                </div>
                                                <button type="button"
                                                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                                                    data-dismiss-target="#alert-88" aria-label="Close"
                                                    x-on:click="cerrarAlerta = true">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <p class="block mb-2 mt-5 dark:text-white">
                                                Institución de procedencia:
                                            </p>
                                            <p class="font-bold">{{ $form->lugarProcedenciaBanner }}</p>
                                            @error('form.lugarProcedenciaBanner')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror


                                            <p class="block mb-2 mt-5 dark:text-white">
                                                Nombre del Cuerpo Académico, red o grupo de investigación:
                                            </p>
                                            <p class="font-bold">{{ $form->nombreGrupoBanner }}</p>
                                            @error('form.nombreGrupoBanner')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror

                                            <p class="block mb-2 mt-5 dark:text-white">
                                                Área temática:
                                            </p>
                                            <p class="font-bold">{{ $form->areaSeleccionadaBanner }}</p>
                                            @error('form.areaSeleccionadaBanner')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror

                                            <div x-show="lideres.length > 0 || integrantes.length > 0"
                                                class="mt-5 ml-8">
                                                <h2 class="text-lg font-medium text-verde">
                                                    Directorio
                                                </h2>
                                                <div x-show="lideres.length > 0">
                                                    <p class="block ml-3 font-bold dark:text-white">
                                                        Líder
                                                    </p>
                                                    <ul class="list-disc ml-7">
                                                        <template x-for="(lider, index) in lideres"
                                                            :key="index">
                                                            <li>
                                                                <span x-text="lider.gradoAcademicoAbrev"></span>
                                                                <span x-text="lider.nombre"></span> <span
                                                                    x-text="lider.apellidoPaterno"></span>
                                                                <span x-text="lider.apellidoMaterno"></span>
                                                            </li>
                                                        </template>
                                                    </ul>
                                                </div>
                                                <div x-show="integrantes.length > 0" class="mt-4">
                                                    <ul class="list-disc ml-7">
                                                        <p class="-ml-4 font-bold dark:text-white">
                                                            Colaboradores
                                                        </p>
                                                        <template x-for="(integrante, index) in integrantes"
                                                            :key="index">
                                                            <template
                                                                x-if="integrante.tipoIntegrante == 'Colaborador'">
                                                                <li>
                                                                    <span
                                                                        x-text="integrante.gradoAcademicoAbrev"></span>
                                                                    <span x-text="integrante.nombre"></span> <span
                                                                        x-text="integrante.apellidoPaterno"></span>
                                                                    <span x-text="integrante.apellidoMaterno"></span>
                                                                </li>
                                                            </template>
                                                        </template>
                                                    </ul>
                                                </div>
                                                <div x-show="integrantes.length > 0" class="mt-4">
                                                    <ul class="list-disc ml-7">
                                                        <p class="-ml-4 font-bold dark:text-white">
                                                            Integrantes
                                                        </p>
                                                        <template x-for="(integrante, index) in integrantes"
                                                            :key="index">
                                                            <template x-if="integrante.tipoIntegrante == 'Integrante'">
                                                                <li>
                                                                    <span
                                                                        x-text="integrante.gradoAcademicoAbrev"></span>
                                                                    <span x-text="integrante.nombre"></span> <span
                                                                        x-text="integrante.apellidoPaterno"></span>
                                                                    <span x-text="integrante.apellidoMaterno"></span>
                                                                </li>
                                                            </template>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <p class="mb-2 mt-2 dark:text-white">
                                                    Descripción de su principal línea de generación y aplicación del
                                                    conocimiento:
                                                </p>
                                                <p class="font-bold">{{ $form->descripcionBanner }}</p>
                                                @error('form.descripcionBanner')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <h2 class="mt-5 text-lg font-medium text-verde">Datos de contacto</h2>
                                            <div class="sm:flex flex-row gap-x-4 mt-2">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <p class="mb-2 inline-block dark:text-white">
                                                        Teléfono:
                                                    </p>
                                                    <p class="font-bold inline-block">{{ $form->telefonoBanner }}</p>
                                                    @error('form.telefonoBanner')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <p class="mb-2 dark:text-white inline-block">
                                                        Correo electrónico:
                                                    </p>
                                                    <p class="font-bold inline-block">{{ $form->correoBanner }}</p>

                                                    @error('form.correoBanner')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <p class="block mb-2 dark:text-white">
                                                    Redes sociales (opcionales)
                                                </p>
                                                <div
                                                    class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4 text-center mt-1 overflow-x-auto p-5">
                                                    <div x-data="{ open: false }" class="basis-1/4">
                                                        <button type="button"
                                                            class="button bg-[#1877f2] sm:w-14 w-36 sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="Facebook">
                                                            <img src="{{ asset('img/iconos/icFacebook.png') }}"
                                                                alt="Icono Facebook" class="inline-block w-8">
                                                            <span class="sm:hidden">Facebook</span>
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="facebook"
                                                                wire:model="form.facebook"
                                                                placeholder="facebook.com/uaemex">
                                                            @error('form.facebook')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div x-data="{ open: false }" class="basis-1/4">
                                                        <button type="button"
                                                            class="button bg-black sm:w-14 w-36 sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="X">
                                                            <img src="{{ asset('img/iconos/icX.png') }}"
                                                                alt="Icono X" class="inline-block w-8">
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="x" wire:model="form.x"
                                                                placeholder="x.com/uaemex">
                                                            @error('form.x')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div x-data="{ open: false }" class="basis-1/4">
                                                        <button type="button"
                                                            class="button bg-[#ff0000] sm:w-14 w-36 sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="YouTube">
                                                            <img src="{{ asset('img/iconos/icYoutube.png') }}"
                                                                alt="Icono YouTube" class="inline-block w-8">
                                                            <span class="sm:hidden">YouTube</span>
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="youtube"
                                                                wire:model="form.youtube"
                                                                placeholder="youtube.com/uaemex">
                                                            @error('form.youtube')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div x-data="{ open: false }" class="basis-1/4 mb-5">
                                                        <button type="button"
                                                            class="button bg-dorado sm:w-14 w-36 sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="Otra red social">
                                                            <h1 class="font-bold sm:-ml-1">Otra</h1>
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="otraRed"
                                                                wire:model="form.otraRed"
                                                                placeholder="otraRedSocial.com/uaemex">
                                                            @error('form.otraRed')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-4">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right bg-blanco text-gray-500 border border-b-0 border-gray-200 focus:ring-1 focus:ring-gray-300 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            :class="{
                                                'bg-red-100': '{{ $errors->first('form.boucher') != '' }}'
                                            }"
                                            data-accordion-target="#accordion-open-body-4" aria-expanded="false"
                                            aria-controls="accordion-open-body-4">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>Pago</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-4" x-data="{
                                        pagoAcordeon: false,
                                        cerrarAlerta: false
                                    }"
                                        :class="{
                                            'hidden': pagoAcordeon ==
                                                false && '{{ $errors->first('form.boucher') == '' }}'
                                        }"
                                        aria-labelledby="accordion-open-heading-4">
                                        <div class="p-5 border border-dorado/60 rounded-b-xl dark:border-gray-700">
                                            <h1>Datos para realizar pago:</h1>
                                            <div id="alert-8" :class="{ 'hidden': cerrarAlerta == true }"
                                                class="flex mt-5 items-center p-4  text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                                role="alert">
                                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div class="ms-3 text-sm font-medium">
                                                    <span class="font-extrabold">Importante:</span>
                                                    para transferencias
                                                    internacionales el banco de la persona ordenante debe emitir la
                                                    transferencia internacional mediante un mensaje SWIFT MT10.
                                                    Costos y comisiones no bonificables • El costo de emisión en
                                                    sucursal es de $39 dólares + IVA • El costo de emisión por
                                                    bbva.mx es de $20 dólares + IVA por evento • El costo de
                                                    emisión por BBVA Net Cash (Banca de Empresas y Gobierno) es
                                                    de $20 dólares + IVA por evento • El costo de recepción, sin
                                                    importar el monto, será de $30 dólares + IVA.

                                                </div>
                                                <button type="button"
                                                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                                                    data-dismiss-target="#alert-8" aria-label="Close"
                                                    x-on:click="cerrarAlerta = true">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="flex md:items-center md:flex-row flex-col md:gap-x-5 gap-y-5 ">
                                                <div
                                                    class="basis-1/2 bg-[#003a7c] md:w-1/2 w-full rounded-xl mt-5 p-4 text-white">
                                                    <h1 class="text-2xl">BBVA</h1>
                                                    <h2 class="mt-4">Nombre:
                                                        <span
                                                            class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                            INGRESOS EXTRAORDINARIOS CENTRO DE INVESTIGACIÓN EN CIENCIAS
                                                            BIOLÓGICAS APLICADAS CICBA
                                                        </span>
                                                    </h2>
                                                    <h2 class="sm:text-center text-start mt-6">
                                                        CLABE INTERBANCARIA:
                                                        <span
                                                            class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                            0124200 0117895704 7
                                                        </span>
                                                    </h2>
                                                    <h2 class="sm:text-center text-start mt-4">
                                                        Código Swift:
                                                        <span
                                                            class="font-bold cursor-pointer hover:underline hover:decoration-1">
                                                            BCMRMXMMPYM
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
                                                                Ingreso EICARTISSA24
                                                            </span>
                                                        </h2>
                                                    </div>
                                                </div>

                                                <div class="basis-1/2">
                                                    <label class="mb-2 dark:text-white" for="form.boucher">Subir
                                                        comprobante de pago</label><span
                                                        class="font-bold text-red-600">*</span>
                                                    <div class="bg-transparent h-10 flex items-center rounded-l-lg">
                                                        <div>
                                                            <input aria-describedby="form.boucher_help"
                                                                id="form.boucher" type="file"
                                                                accept=".jpg,.png,.pdf" wire:model.live="form.boucher"
                                                                class="inline-block"
                                                                x-on:change="pagoAcordeon = true" />
                                                        </div>
                                                        <div
                                                            class="flex items-center bg-gray-200 h-10 w-full rounded-r-md -ml-6">
                                                            @empty($form->boucher)
                                                                <label for="form.boucher"
                                                                    class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                                    Sin archivos seleccionados.
                                                                </label>
                                                            @endempty
                                                            @empty(!$form->boucher)
                                                                <p title="Clic para quitar archivo adjuntado."
                                                                    class="text-textos sm:text-base text-sm pl-2 cursor-pointer"
                                                                    wire:click="limpiarArchivo('boucher')">
                                                                    {{ $form->boucher->getClientOriginalName() }}</p>
                                                            @endempty
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="form.boucher">
                                                        <span class="text-sm text-textos">Cargando archivo...</span>
                                                    </div>
                                                    @error('form.boucher')
                                                        <span class=" text-rojo error block">{{ $message }}</span>
                                                    @enderror
                                                    @if ($form->boucher != null)
                                                        <div class="mt-4">
                                                            <label for="si" class="block mb-2 mt-5">
                                                                ¿Requieres factura?<span
                                                                    class="font-bold text-red-600">*</span>
                                                            </label>
                                                            <div class="flex sm:justify-normal justify-around gap-x-5">
                                                                <div>
                                                                    <input type="radio" id="si"
                                                                        name="checkFactura"
                                                                        wire:model.live="form.checkFactura"
                                                                        value="1">
                                                                    <label for="si"
                                                                        class="ml-2 text-textos">Si</label>
                                                                </div>
                                                                <div>
                                                                    <input type="radio" id="no"
                                                                        name="checkFactura"
                                                                        wire:model.live="form.checkFactura"
                                                                        wire:click="limpiarArchivo('csf')"
                                                                        value="0">
                                                                    <label for="no"
                                                                        class="ml-2 text-textos">No</label>
                                                                </div>
                                                            </div>
                                                            @error('form.checkFactura')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    @endif
                                                    @if ($form->checkFactura == 1 && $form->boucher != null)
                                                        <div class="mt-4">
                                                            <label class="block mb-2 dark:text-white" for="form.csf">
                                                                Subir Constancia de Situación Fiscal<span
                                                                    class="font-bold text-red-600">*</span>
                                                            </label>
                                                            <div
                                                                class="bg-transparent h-10 flex items-center rounded-l-lg">
                                                                <div>
                                                                    <input aria-describedby="form.csf_help"
                                                                        id="form.csf" type="file" accept=".pdf"
                                                                        wire:model.live="form.csf">
                                                                </div>
                                                                <div
                                                                    class="flex items-center bg-gray-200 h-10 w-full rounded-r-md -ml-6">
                                                                @empty($form->csf)
                                                                    <label for="form.csf"
                                                                        class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                                        Sin archivos seleccionados.
                                                                    </label>
                                                                @endempty
                                                            @empty(!$form->csf)
                                                                <p wire:click="limpiarArchivo('csf')"
                                                                    title="Clic para quitar archivo adjuntado."
                                                                    class="text-textos sm:text-base text-sm pl-2 cursor-pointer">
                                                                    {{ $form->csf->getClientOriginalName() }}
                                                                </p>
                                                            @endempty
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="form.csf">
                                                        <span class="text-sm text-textos">
                                                            Cargando archivo...
                                                        </span>
                                                    </div>
                                                    @error('form.csf')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="sm:ml-10 ml-4">
                        <input type="checkbox" id="form.aceptoDatos" wire:model.live='form.aceptoDatos'
                            name="form.aceptoDatos" class="mr-2">
                        <label for="form.aceptoDatos">
                            Acepto aviso de privacidad de la UAEMex y acepto que los datos puedan ser utilizados
                            con
                            fines de vinculación y estadísticos.<samp class="text-rojo">*</samp>
                        </label>
                        @error('form.aceptoDatos')
                            <span class=" text-rojo error sm:ml-16 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:ml-10 ml-4">
                        <input type="checkbox" id="form.checkBanner" wire:model.live='form.checkBanner'
                            name="form.checkBanner" class="mr-2">
                        <label for="form.checkBanner">
                            Acepto que la información proporcionada para impresión del banner es correcta.<samp
                                class="text-rojo">*</samp>
                        </label>
                        @error('form.checkBanner')
                            <span class=" text-rojo error sm:ml-16 block">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (session()->has('errorDb'))
                        <div id="alert-2"
                            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">

                                <div class="alert alert-success">
                                    {{ session('errorDb') }}
                                </div>

                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert-4"
                            class="flex items-center p-4 mt-5 text-yellow-600 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                            role="alert">
                            <span class="sr-only">Info</span>
                            <div class="ms-3">
                                <p><span class="font-bold">Advertencia: </span>Faltan campos por completar</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            <svg class="flex-shrink-0 w-3 h-3 inline-block" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg> {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="flex sm:flex-row flex-col sm:justify-end justify-center items-center mt-5">
                        <x-secondary-button wire:click="limpiarCampos">
                            Limpiar campos
                        </x-secondary-button>
                        <button type="button" class="btn-success button" wire:loading.class="opacity-50"
                            wire:target="save" @click="save">
                            Enviar
                            {{-- <div wire:loading wire:target="save" class="sm:pl-2 pl-4">
                            </div> --}}
                        </button>

                        <button type="submit" id="btnEnviar" hidden>Enviar</button>
                    </div>
                </div>
            </form>
            <div wire:loading wire:target="save">
                <div
                    class="overflow-y-auto overflow-x-hidden cursor-progress bg-gray-500/40 fixed flex top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-2 w-full max-w-md max-h-full">
                        <div
                            class="relative bg-white rounded-lg shadow-2xl shadow-[#34778A]/50 dark:bg-gray-700">
                            <div class="p-4 md:p-5 text-center">
                                <svg aria-hidden="true"
                                    class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-[#34778A]"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <h3 class="mb-5 mt-4 text-lg font-normal text-gray-500 dark:text-gray-400">
                                    Guardando información.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function save() {
        Swal.fire({
            customClass: {
                title: 'swal2-title'
            },
            title: '¿Estas seguro de enviarlo?',
            text: 'Te recomendamos revisar la información capturada, ya que una vez enviada no podrás modificarla.',
            position: 'center',
            icon: 'warning',
            iconColor: '#9D9361',
            showCancelButton: true,
            confirmButtonColor: '#62836C',
            cancelButtonColor: '#E86562',
            confirmButtonText: 'Si, enviar',
            cancelButtonText: 'Cerrar',

        }).then((result) => {
            if (result.isConfirmed) {
                //Livewire.dispatch('save');
                let btn = document.getElementById('btnEnviar');
                btn.click();
            }
        });
    }

    telefonoGeneral.addEventListener('keyup', (e) => {
        let valorInput = e.target.value;
        telefonoGeneral.value = valorInput
            .replace(/[^0-9()+]/g, '')
            .replace(/\s/g, '');
    });

    document.getElementById("form.correoGeneral").oncopy = function() {
        return false;
    };

    document.getElementById("form.correoGeneralConfirmacion").oncopy = function() {
        return false;
    };

    document.getElementById("form.correoGeneralConfirmacion").onpaste = function() {
        return false;
    };
</script>
</div>
