<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro participantes') }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">
                    <div id="alert-1"
                        class="flex items-center p-4 mb-4 text-color_primary rounded-lg bg-verde/40 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            Si ya te has registrado antes dirigete <a href="#"
                                class="font-semibold underline hover:no-underline">aquí</a>.
                        </div>
                        <button type="button"
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
                    <form action="">
                        <div x-data="{ selectedRegistro: 0 }">

                            <div>
                                <label for="tipo_registro" class="block mb-2 dark:text-white">
                                    Selecciona procedencia<span class="font-bold text-red-600">*</span>
                                </label>
                                <select id="tipo_registro" x-on:click="open = ! open" x-model="selectedRegistro"
                                    wire:model.live="form.tipo_registro" class="w-full">
                                    <option value="0">Seleccione una opción</option>
                                    <option value="1">Interno a la UAEMex</option>
                                    <option value="2">Externo a la UAEMex</option>
                                </select>
                                @error('form.tipo_registro')
                                    <span class="text-rojo block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div {{-- x-show="selectedRegistro != 0" --}} class="mt-4">
                                <div id="accordion-open" data-accordion="open">
                                    <h2 id="accordion-open-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium bg-blanco rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-1 focus:ring-dorado dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3
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
                                    <div id="accordion-open-body-1" aria-labelledby="accordion-open-heading-1"
                                        class="">
                                        <div class="p-5 border border-t-0 border-dorado dark:border-gray-700">

                                            <div>
                                                <label for="form.nombreGrupo" class="block mb-2 dark:text-white">
                                                    Nombre del Cuerpo Académico, red o grupo de investigación<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <input type="text" id="form.nombreGrupo" class="w-full"
                                                    placeholder="Facultad de Ciencias"
                                                    wire:model.live="form.nombreGrupo" wire:change="updateCuerpoAcadBanner">
                                                @error('form.nombreGrupo')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="sm:flex flex-row gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-3/4 w-full">
                                                    <label for="form.lugarProcedencia"
                                                        class="block mb-2 dark:text-white">
                                                        Nombre completo de la universidad, dependencia o departamento de
                                                        adscripción<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="form.lugarProcedencia" class="w-full"
                                                        wire:model.live="form.lugarProcedencia"
                                                        placeholder="Universidad Autónoma del Estado de México">
                                                    @error('form.lugarProcedencia')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-1/4 w-full sm:mt-0 mt-5">
                                                    <label for="form.pais" class="block mb-2 dark:text-white">
                                                        Pais procedente<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    {{-- <input type="text" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                                                    <select id="form.pais" wire:model.live="form.pais" class="w-full">
                                                        <option value="AR">Argentina</option>
                                                        <option value="BE">Bélgica</option>
                                                        <option value="CA">Canadá</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="ES">España</option>
                                                        <option value="US">Estados Unidos</option>
                                                        <option value="FR">Francia</option>
                                                        <option value="JP">Japón</option>
                                                        <option value="MX" selected>México</option>
                                                        <option value="NL">Países Bajos</option>
                                                    </select>
                                                    @error('form.pais')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="sm:flex flex-row gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <label for="form.telefonoGeneral"
                                                        class="block mb-2 dark:text-white">
                                                        Teléfono<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="form.telefonoGeneral"
                                                        wire:model.live="form.telefonoGeneral" wire:change="updateTelefonoBanner" class="w-full"
                                                        placeholder="Teléfono">
                                                    @error('form.telefonoGeneral')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <label for="form.correoGeneral"
                                                        class="block mb-2 dark:text-white">
                                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="email" id="form.correoGeneral"
                                                        wire:model.live="form.correoGeneral" wire:change="updateCorreoBanner" class="w-full"
                                                        placeholder="Correo electrónico">
                                                    <p class="text-sm text-textos ml-1">
                                                        <span class="font-bold">Nota: </span>
                                                        Este correo electrónico sera el identificador del registro y el
                                                        principal medio de contacto.
                                                    </p>
                                                    @error('form.correoGeneral')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="sm:flex flex-row gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-1/4 w-full">
                                                    <label for="areaSeleccionada" class="block mb-2 dark:text-white">
                                                        Área temática<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    {{--  <select id="form.areasSeleccionadas"
                                                        wire:model.live="form.areasSeleccionadas"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="0">Selecciona una opción</option>
                                                        @foreach ($areasOptions as $area)
                                                            <option value="{{ $area->id }}">
                                                                {{ $area->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                    <ul>
                                                        @foreach ($areasOptions as $area)
                                                            <li wire:click="actualizarAreasSeleccionadas({{ $area }})"
                                                                class="cursor-pointer text-textos hover:bg-verde/70 hover:text-white hover:font-bold {{ $area->id == $areaSeleccionada ? 'bg-verde/40' : 'bg-blanco' }}">
                                                                {{ $area->nombre }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    @error('form.areasSeleccionadas')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="flex-initial sm:w-3/4 w-full">
                                                    <label for="form.subareaTematica"
                                                        class="block mb-2 dark:text-white">
                                                        Subárea temática<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <div>
                                                        <div class="flex flex-col">
                                                            @foreach (collect($subareasOptions)->groupBy('grupo.nombre') as $grupo => $subareasDelGrupo)
                                                                <h1 class="text-verde font-bold">
                                                                    {{ $grupo }}</h1>
                                                                <ul>
                                                                    @foreach ($subareasDelGrupo as $subarea)
                                                                        <li wire:click="selectSubareaOption({{ $subarea }})"
                                                                            class="hover:bg-dorado/60 hover:text-white hover:font-bold cursor-pointer flex items-center"
                                                                            :class="{ 'bg-dorado/30': {{ array_search($subarea['id'], array_column($this->selectedSubareas, 'id')) !== false ? 'true' : 'false ?>' }} }">
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
                                                        @error('subareasSeleccionadas')
                                                            <span class="text-rojo block">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- <div class="mt-5">
                                                <p>Subareas seleccionadas:</p>
                                                <ul>
                                                    @foreach ($selectedSubareas as $subarea)
                                                        <li wire:click="selectSubareaOption({{ collect($subarea) }}")>
                                                            {{ $subarea['area'] }}
                                                            {{ $subarea['grupo'] }}
                                                            {{ $subarea['nombre'] }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div> --}}
                                            <div class="mt-5">
                                                <div class="flex items-center">
                                                    <label for="btnLineas">Lineas de generación y aplicacion del
                                                        conocimiento<span class="font-bold text-red-600 mr-2">*</span>
                                                    </label>
                                                    <button type="button" id="btnLineas"
                                                        class="btn-transition bg-verde text-white text-xl rounded-full px-4 py-2"
                                                        wire:click="$dispatch('openModal', {component: 'modals.lineas-modal'})">
                                                        +
                                                    </button>
                                                    @error('form.lineasInvestigacion')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div x-data="{ elementos: $wire.entangle('form.lineasInvestigacion') }" x-show="elementos.length > 0 "
                                                    class ="overflow-x-auto mt-5">
                                                    <table
                                                        class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                        <thead>
                                                            <tr class="bg-blanco">
                                                                <th class="w-[20%]">Nombre de la línea</th>
                                                                <th class="w-[70%]">Descripción</th>
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
                                                                                @click="$wire.dispatch('openModal', { component: 'modals.lineas-modal', arguments: { _id: elemento._id, nombre: elemento.nombre, descripcion: elemento.descripcion }})">
                                                                                <img src="{{ '/img/botones/btn_editar.png' }}"
                                                                                    alt="Image/png" title="Editar">
                                                                            </button>
                                                                        </div>
                                                                        <div class="flex">
                                                                            <button type="button"
                                                                                @click.stop="elementos.splice(index, 1); $wire.deleteLinea(elemento)"
                                                                                class="btn-tablas btn-transition">
                                                                                <img src="{{ 'img/botones/btn_eliminar.png' }}"
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
                                            </div>

                                            <div class="mt-7">
                                                <label for="form.productosLogrados"
                                                    class="block mb-2 dark:text-white">
                                                    Principales productos logrados<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="form.productosLogrados" rows="4" wire:model.live="form.productosLogrados" class="w-full"
                                                    placeholder="Principales productos logrados..."></textarea>
                                                @error('form.productosLogrados')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mt-5">
                                                <label for="form.casosExito" class="block mb-2 mt-2 dark:text-white">
                                                    Casos de éxito de trasnferencia<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="form.casosExito" rows="4" wire:model.live="form.casosExito" class="w-full"
                                                    placeholder="Casos de éxito..."></textarea>
                                                @error('form.casosExito')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mt-5">
                                                <label for="form.propuestas" class="block mb-2 mt-2 dark:text-white">
                                                    Proyección y propuesta de vinculación o servicios que se brindan o
                                                    proyectos para posible vinculación<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="form.propuestas" rows="4" wire:model.live="form.propuestas" class="w-full"
                                                    placeholder="Proyección y propuesta de vinculación..."></textarea>
                                                @error('form.propuestas')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="sm:flex flex-row gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-1/2 w-full">
                                                    <label for="form.fortalezas"
                                                        class="block mb-2 mt-2 dark:text-white">
                                                        Fortalezas<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <textarea id="form.fortalezas" rows="4" wire:model.live="form.fortalezas" class="w-full"
                                                        placeholder="Fortalezas..."></textarea>
                                                    @error('form.fortalezas')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-1/2 w-full">
                                                    <label for="form.necesidades"
                                                        class="block mb-2 mt-2 dark:text-white">
                                                        Necesidades<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <textarea id="form.necesidades" rows="4" wire:model.live="form.necesidades" class="w-full"
                                                        placeholder="Necesidades..."></textarea>
                                                    @error('form.necesidades')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium bg-blanco rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-1 focus:ring-dorado dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
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
                                    <div id="accordion-open-body-2" class="hidden"
                                        aria-labelledby="accordion-open-heading-2">
                                        <div class="p-5 border border-b-0 border-dorado dark:border-gray-700">
                                            <div class="flex sm:flex-row flex-col gap-6">
                                                <div class="flex-initial w-full">
                                                    <div class="flex items-end">
                                                        <label for="btnLider" class="block mb-2 dark:text-white">
                                                            Lider
                                                        </label>
                                                        {{-- <x-secondary-button class="ms-3"
                                                        wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                        {{ __('Add') }}
                                                        </x-secondary-button> --}}
                                                        <button type="button" id="btnLider"
                                                            class="btn-transition bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
                                                            wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                            +
                                                        </button>
                                                    </div>

                                                    <div class="overflow-x-auto mt-5">
                                                        <table
                                                            class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                            <thead>
                                                                <tr class="bg-blanco">
                                                                    <th class="w-[80%]">Nombre del lider</th>
                                                                    <th class="w-[20%]">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Héctor Alejandro Montes Venegas</td>
                                                                    <td>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @error('form.integrantes')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial w-full">
                                                    <div class="flex items-end">
                                                        <label for="btnIntegrantes"
                                                            class="block mb-2 dark:text-white">
                                                            Integrantes
                                                        </label>
                                                        {{-- <x-secondary-button class="ms-3"
                                                        wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                        {{ __('Add') }}
                                                    </x-secondary-button> --}}
                                                        <button type="button" id="btnIntegrantes"
                                                            class="btn-transition bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
                                                            wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                            +
                                                        </button>
                                                    </div>

                                                    <div class="overflow-x-auto mt-5">
                                                        <table
                                                            class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                            <thead>
                                                                <tr class="bg-blanco">
                                                                    <th class="w-[80%]">Nombre de los integrantes</th>
                                                                    <th class="w-[20%]">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Erick Jonathan Ruiz Gonzales</td>
                                                                    <td>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Ana Karen Valdez Contreras</td>
                                                                    <td>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Sonia Solano Jimenez</td>
                                                                    <td>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas btn-transition">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right bg-blanco text-gray-500 border border-gray-200 focus:ring-1 focus:ring-dorado dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                                            aria-controls="accordion-open-body-3">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Banner</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-3" class="hidden"
                                        aria-labelledby="accordion-open-heading-3">
                                        <div class="p-5 border border-t-0 border-dorado dark:border-gray-700">
                                            <label for="form.nombreGrupoBanner" class="block mb-2 dark:text-white">
                                                Nombre del Cuerpo Académico, red o grupo de investigación<span
                                                    class="font-bold text-red-600">*</span>
                                            </label>
                                            <input type="text" id="form.nombreGrupoBanner"
                                                wire:model="form.nombreGrupoBanner"
                                                class="w-full disabled"
                                                value="{{ $form->nombreGrupo }}"
                                                placeholder="Nombre del Cuerpo Académico" disabled>
                                            @error('form.nombreGrupoBanner')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror

                                            <div class="mt-5">
                                                <label for="form.integrantesBanner"
                                                    class="block mb-2 dark:text-white">
                                                    Integrantes
                                                </label>
                                                <ul class="ps-5 list-disc dark:text-gray-400">
                                                    <li>
                                                        Ana Karen Valdez Contreras
                                                    </li>
                                                    <li>
                                                        Erick Jonathan Ruiz Gonzales
                                                    </li>
                                                </ul>
                                                @error('form.integrantesBanner')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mt-5">
                                                <label for="form.descripcionBanner"
                                                    class="block mb-2 mt-2 dark:text-white">
                                                    Descripción de su principal línea de generación y aplicación del
                                                    conocimiento<span class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="form.descripcionBanner" rows="4" wire:model="form.descripcionBanner" class="w-full"
                                                    placeholder="Descripción..."></textarea>
                                                @error('form.descripcionBanner')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <h2 class="mt-5">Datos de contacto</h2>
                                            <div class="sm:flex flex-row items-center gap-x-4 mt-2">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <label for="form.telefonoBanner"
                                                        class="block mb-2 dark:text-white">
                                                        Teléfono<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="form.telefonoBanner"
                                                        wire:model="form.telefonoBanner" class="w-full disabled"
                                                        placeholder="Teléfono" disabled>
                                                    @error('form.telefonoBanner')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <label for="form.correoBanner" class="block mb-2 dark:text-white">
                                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="email" id="form.correoBanner"
                                                        wire:model="form.correoBanner" class="w-full disabled"
                                                        value="{{ $form->correoGeneral }}"
                                                        placeholder="Correo electrónico" disabled>
                                                    @error('form.correoBanner')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <label class="block mb-2 dark:text-white">
                                                    Redes sociales
                                                </label>
                                                <div
                                                    class="flex sm:flex-row flex-col sm:gap-y-0 gap-y-4 text-center mt-1">
                                                    <div x-data="{ open: false }" class="basis-1/3">
                                                        <button type="button"
                                                            class="button bg-[#1877f2] sm:w-14 w-full sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="Facebook">
                                                            <img src="{{ 'img/iconos/icFacebook.png' }}"
                                                                alt="Icono Facebook" class="inline-block w-8">
                                                            <span class="sm:hidden">Facebook</span>
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="facebook"
                                                                wire:model="form.facebook"
                                                                placeholder="facebook.com/uaemex">
                                                        </div>
                                                    </div>

                                                    <div x-data="{ open: false }" class="basis-1/3">
                                                        <button type="button"
                                                            class="button bg-black sm:w-14 w-full sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="X">
                                                            <img src="{{ 'img/iconos/icX.png' }}" alt="Icono X"
                                                                class="inline-block w-8">
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="x" wire:model="form.x"
                                                                placeholder="x.com/uaemex">
                                                        </div>
                                                    </div>

                                                    <div x-data="{ open: false }" class="basis-1/3">
                                                        <button type="button"
                                                            class="button bg-[#ff0000] sm:w-14 w-full sm:h-14 h-12 sm:rounded-full"
                                                            @click="open = ! open" title="YouTube">
                                                            <img src="{{ 'img/iconos/icYoutube.png' }}"
                                                                alt="Icono YouTube" class="inline-block w-8">
                                                            <span class="sm:hidden">YouTube</span>
                                                        </button>
                                                        <div x-show="open" class="mt-2">
                                                            <input type="text" id="youtube"
                                                                wire:model="form.youtube"
                                                                placeholder="youtube.com/uaemex">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-4">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right bg-blanco text-gray-500 border border-b-0 border-gray-200 focus:ring-1 focus:ring-dorado dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
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
                                    <div id="accordion-open-body-4" class="hidden"
                                        aria-labelledby="accordion-open-heading-4">
                                        <div class="p-5 border border-dorado dark:border-gray-700">
                                            <label class="block mb-2 dark:text-white" for="form.boucher">Subir
                                                comprobante de pago</label>
                                            <input
                                                class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="form.boucher_help" id="form.boucher" type="file"
                                                wire:model.live="form.boucher">
                                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                id="form.boucher_help">
                                                <span class="font-bold">Importante:</span> Es necesario subir tu
                                                comprobante de pago para ser
                                                considerado como participante.
                                            </div>
                                            @error('form.boucher')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-7">
                            <x-primary-button class="ms-3">
                                {{ __('Enviar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
