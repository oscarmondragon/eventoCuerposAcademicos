<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro participantes') }}
        </h2>
    </x-slot>
    <div x-data="{ integrantes: $wire.entangle('form.integrantes'), lideres: $wire.entangle('form.lideres'), selectedSubareas: $wire.entangle('selectedSubareas') }" class="py-6 text-textos">
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
                    <form wire:submit="save">
                        <div>
                            <div class="mt-4">
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
                                            <div class="flex sm:flex-row flex-col sm:gap-x-5 gap-y-5">
                                                <div class="basis-1/4">
                                                    <label for="form.tipoRegistro" class="block mb-2 dark:text-white">
                                                        Selecciona procedencia<span
                                                            class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select id="form.tipoRegistro" wire:model.live="form.tipoRegistro"
                                                        class="w-full">
                                                        <option value="0">Seleccione una opción</option>
                                                        <option value="1">Interno a la UAEMex</option>
                                                        <option value="2">Externo a la UAEMex</option>
                                                    </select>
                                                    @error('form.tipoRegistro')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="basis-3/4">
                                                    <label for="form.nombreGrupo" class="block mb-2 dark:text-white">
                                                        Nombre del Cuerpo Académico, red o grupo de investigación<span
                                                            class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="form.nombreGrupo" class="w-full"
                                                        placeholder="Facultad de Ciencias"
                                                        wire:model.live="form.nombreGrupo"
                                                        wire:change="updateCuerpoAcadBanner" maxlength="150">
                                                    @error('form.nombreGrupo')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>
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
                                                        placeholder="Universidad Autónoma del Estado de México"
                                                        maxlength="150">
                                                    @error('form.lugarProcedencia')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-1/4 w-full sm:mt-0 mt-5">
                                                    <label for="form.pais" class="block mb-2 dark:text-white">
                                                        País procedente<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select id="form.pais" wire:model.live="form.pais"
                                                        class="w-full">
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Bélgica">Bélgica</option>
                                                        <option value="Canadá">Canadá</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="España">España</option>
                                                        <option value="Estados Unidos">Estados Unidos</option>
                                                        <option value="Francia">Francia</option>
                                                        <option value="Japón">Japón</option>
                                                        <option value="México" selected>México</option>
                                                        <option value="Países Bajos">Países Bajos</option>
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
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 dark:text-gray-400" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 19 18">
                                                                <path
                                                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" id="form.telefonoGeneral"
                                                            wire:model.live="form.telefonoGeneral"
                                                            wire:change="updateTelefonoBanner"
                                                            class="w-full ps-10 p-2.5" {{-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" --}}
                                                            placeholder="(+52)7226490394" maxlength="15" />
                                                    </div>
                                                    @error('form.telefonoGeneral')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
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
                                                            class="w-full ps-10 p-2.5" placeholder="uaemex@gmail.com"
                                                            maxlength="100" />
                                                    </div>
                                                    <p class="text-sm text-textos ml-1">
                                                        <span class="font-bold">Nota: </span>
                                                        Este correo electrónico sera el identificador del registro y el
                                                        principal medio de contacto.
                                                    </p>

                                                    @error('form.correoGeneral')
                                                        <span class="text-rojo block -mt-1 ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="sm:flex flex-row items-center gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-1/4 w-full">
                                                    <label for="areaSeleccionada" class="block mb-2 dark:text-white">
                                                        Área temática<span class="font-bold text-red-600">*</span>
                                                    </label>
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
                                                                    {{ $grupo }}
                                                                </h1>
                                                                <ul>
                                                                    @foreach ($subareasDelGrupo as $subarea)
                                                                        <li wire:click="selectSubareaOption({{ $subarea }})"
                                                                            class="hover:bg-dorado/60 hover:text-white hover:font-bold cursor-pointer flex items-center"
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
                                            <div class="mt-5 sm:ml-8" x-show="selectedSubareas.length > 0">
                                                <h2 class="text-lg font-medium text-verde">
                                                    Subareas seleccionadas:
                                                </h2>
                                                <ul class="list-disc">
                                                    @foreach ($selectedSubareas as $subarea)
                                                        <li
                                                            class="sm:ml-12 underline underline-offset-4 decoration-1 decoration-verde pt-2">
                                                            {{ $subarea['area'] }} <span
                                                                class="text-verde">&#10142;</span>
                                                            {{ $subarea['grupo'] }} <span
                                                                class="text-verde">&#10142;</span>
                                                            <span class="font-bold">{{ $subarea['nombre'] }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
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
                                                </div>
                                                @error('form.lineasInvestigacion')
                                                    <span class="text-rojo block mt-2">{{ $message }}</span>
                                                @enderror
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
                                                    placeholder="Principales productos logrados..." maxlength="500"></textarea>
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
                                                    placeholder="Casos de éxito..." maxlength="500"></textarea>
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
                                                    placeholder="Proyección y propuesta de vinculación..." maxlength="500"></textarea>
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
                                                        placeholder="Fortalezas..." maxlength="500"></textarea>
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
                                                        placeholder="Necesidades..." maxlength="500"></textarea>
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
                                    <div id="accordion-open-body-2"
                                        :class="{ 'hidden': integrantes.length < 1 && lideres.length < 1 }"
                                        aria-labelledby="accordion-open-heading-2">
                                        <div class="p-5 border border-b-0 border-dorado dark:border-gray-700">
                                            <div class="flex sm:flex-row flex-col gap-6">
                                                <div class="flex-initial w-full">
                                                    <div class="flex items-end">
                                                        <label for="btnLider" class="block mb-2 dark:text-white">
                                                            Líder<span class="font-bold text-red-600">*</span>
                                                        </label>
                                                        <button type="button" id="btnLider"
                                                            x-bind:disabled="lideres.length > 0"
                                                            title="Solo se puede agregar un líder."
                                                            :class="{ 'disabled:bg-[#e0dddd]': lideres.length > 0 }"
                                                            class="btn-transition bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
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
                                                                            <th
                                                                                x-text="lider.nombre + ' ' + lider.apellidoPaterno + ' ' + lider.apellidoMaterno">
                                                                            </th>
                                                                            <td class="sm:flex gap-2">
                                                                                <div>
                                                                                    <button type="button"
                                                                                        class="btn-tablas btn-transition"
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
                                                                                        telefono: lider.telefono, 
                                                                                        tipoRegistro: {{ $form->tipoRegistro }},
                                                                                        isLider: 1
                                                                                    }})">
                                                                                        <img src="{{ '/img/botones/btn_editar.png' }}"
                                                                                            alt="Image/png"
                                                                                            title="Editar">
                                                                                    </button>
                                                                                </div>
                                                                                <div>
                                                                                    <button type="button"
                                                                                        @click.stop="lideres.splice(index, 1); $wire.deleteLinea(lider)"
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
                                                        @error('form.lideres')
                                                            <span class="text-rojo block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="flex-initial w-full">
                                                    <div class="flex items-end">
                                                        <label for="btnIntegrantes"
                                                            class="block mb-2 dark:text-white">
                                                            Integrantes<span class="font-bold text-red-600">*</span>
                                                        </label>
                                                        <button type="button" id="btnIntegrantes"
                                                            class="btn-transition bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
                                                            @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: {
                                                                tipoRegistro: {{ $form->tipoRegistro }}, isLider: 0
                                                            }})">
                                                            +
                                                        </button>
                                                    </div>

                                                    <div x-show="integrantes.length > 0 "
                                                        class ="overflow-x-auto mt-5">
                                                        <table
                                                            class="table-auto text-left text-sm w-3/4 sm:w-full mx-auto">
                                                            <thead>
                                                                <tr class="bg-blanco">
                                                                    <th class="w-[85%]">Nombre de los integrantes</th>

                                                                    <th class="w-[15%]">Acción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <template x-for="(integrante, index) in integrantes"
                                                                    :key="index">
                                                                    <tr
                                                                        class="border border-b-gray-200 border-transparent ">
                                                                        <th
                                                                            x-text="integrante.nombre + ' ' + integrante.apellidoPaterno + ' ' + integrante.apellidoMaterno">
                                                                        </th>
                                                                        <td class="sm:flex gap-2">
                                                                            <div>
                                                                                <button type="button"
                                                                                    class="btn-tablas btn-transition"
                                                                                    @click="$wire.dispatch('openModal', { component: 'modals.integrantes-modal', arguments: { 
                                                                                        _id: integrante._id, 
                                                                                        nombre: integrante.nombre, 
                                                                                        apellidoPaterno: integrante.apellidoPaterno,  
                                                                                        apellidoMaterno: integrante.apellidoMaterno,
                                                                                        tipoLider: integrante.tipoLider,
                                                                                        gradoAcademico: integrante.gradoAcademico, 
                                                                                        gradoAcademicoAbrev: integrante.gradoAcademicoAbrev, 
                                                                                        sexo: integrante.sexo, 
                                                                                        genero: integrante.genero, 
                                                                                        correo: integrante.correo, 
                                                                                        telefono: integrante.telefono, 
                                                                                        tipoRegistro: {{ $form->tipoRegistro }},
                                                                                        isLider: 0
                                                                                    }})">
                                                                                    <img src="{{ '/img/botones/btn_editar.png' }}"
                                                                                        alt="Image/png"
                                                                                        title="Editar">
                                                                                </button>
                                                                            </div>
                                                                            <div>
                                                                                <button type="button"
                                                                                    @click.stop="integrantes.splice(index, 1); $wire.deleteLinea(integrante)"
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
                                                    @error('form.integrantes')
                                                        <span class="text-rojo block mt-5">{{ $message }}</span>
                                                    @enderror
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
                                                </svg>Banner: Estos datos serán utilizados para imprimirlos en la lona
                                                que contempla el kit y para formar un directorio</span>
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
                                                wire:model="form.nombreGrupoBanner" class="w-full disabled"
                                                value="{{ $form->nombreGrupo }}"
                                                placeholder="Nombre del Cuerpo Académico" disabled>
                                            @error('form.nombreGrupoBanner')
                                                <span class="text-rojo block">{{ $message }}</span>
                                            @enderror

                                            <div class="mt-5" x-show="lideres.length > 0 || integrantes.length > 0">
                                                <label for="form.integrantesBanner"
                                                    class="block mb-2 dark:text-white">
                                                    Integrantes
                                                </label>
                                                <ul class="list-disc ml-7 grid grid-cols-2">
                                                    <template x-for="(lider, index) in lideres" :key="index">
                                                        <li class="underline decoration-verde">
                                                            <span x-text="lider.nombre"></span> <span
                                                                x-text="lider.apellidoPaterno"></span>
                                                            <span x-text="lider.apellidoMaterno"></span>
                                                            <span class="font-bold"> (Lider)</span>

                                                        </li>
                                                    </template>
                                                    <template x-for="(integrante, index) in integrantes"
                                                        :key="index">
                                                        <li>
                                                            <span x-text="integrante.nombre"></span> <span
                                                                x-text="integrante.apellidoPaterno"></span> <span
                                                                x-text="integrante.apellidoMaterno"></span>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>

                                            <div class="mt-5">
                                                <label for="form.descripcionBanner"
                                                    class="block mb-2 mt-2 dark:text-white">
                                                    Descripción de su principal línea de generación y aplicación del
                                                    conocimiento<span class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="form.descripcionBanner" rows="4" wire:model="form.descripcionBanner" class="w-full"
                                                    placeholder="Descripción..." maxlength="500"></textarea>
                                                @error('form.descripcionBanner')
                                                    <span class="text-rojo block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <h2 class="mt-5">Datos de contacto</h2>
                                            <div class="sm:flex flex-row gap-x-4 mt-2">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <label for="form.telefonoBanner"
                                                        class="block mb-2 dark:text-white">
                                                        Teléfono<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 dark:text-gray-400" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 19 18">
                                                                <path
                                                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" id="form.telefonoBanner"
                                                            wire:model="form.telefonoBanner"
                                                            class="w-full disabled ps-10 p-2.5"
                                                            wire:change="updateTelefonoBanner"
                                                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                                            placeholder="7226-456-8946" disabled />
                                                    </div>
                                                    @error('form.telefonoBanner')
                                                        <span class="text-rojo block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <label for="form.correoBanner" class="block mb-2 dark:text-white">
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
                                                        <input type="email" id="form.correoBanner"
                                                            wire:model="form.correoBanner"
                                                            class="w-full disabled ps-10 p-2.5"
                                                            placeholder="Correo electrónico" disabled />
                                                    </div>

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
                                                                placeholder="facebook.com/uaemex" maxlength="50">
                                                            @error('form.facebook')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
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
                                                                placeholder="x.com/uaemex" maxlength="50">
                                                            @error('form.x')
                                                                <span class="text-rojo block">{{ $message }}</span>
                                                            @enderror
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
                                                                placeholder="youtube.com/uaemex" maxlength="50">
                                                            @error('form.youtube')
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
                                    <div id="accordion-open-body-4" x-data="{ boucher: $wire.entangle('form.boucher') }"
                                        :class="{ 'hidden': boucher == null }"
                                        aria-labelledby="accordion-open-heading-4">
                                        <div class="p-5 border border-dorado dark:border-gray-700">
                                            <label class="block mb-2 dark:text-white" for="form.boucher">Subir
                                                comprobante de pago</label>
                                            <input
                                                class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="form.boucher_help" id="form.boucher" type="file"
                                                wire:model.live="form.boucher">
                                            <div wire:loading wire:target="form.boucher">Uploading...</div>
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
                        <div class="mt-5">
                            <input type="checkbox" id="form.aceptoDatos" wire:model.live='form.aceptoDatos'
                                name="form.aceptoDatos" class="rounded-full sm:ml-10 mr-2">
                            <label for="form.aceptoDatos">
                                Acepto aviso de privacidad de la UAEMex y acepto que los datos puedan ser utilizados con
                                fines de vinculación y estadísticos.<samp class="text-rojo">*</samp>
                            </label>
                            @error('form.aceptoDatos')
                                <span class=" text-rojo error sm:ml-16 block">{{ $message }}</span>
                            @enderror
                            <div id="alert-2" x-show="session('error')"
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
                                        {{ session('error') }}
                                    </div>

                                </div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                    data-dismiss-target="#alert-2" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                            @if ($errors->any())
                                <div id="alert-4"
                                    class="flex items-center p-4 mt-5 text-yellow-600 rounded-lg bg-yellow-100 dark:bg-gray-800 dark:text-yellow-300"
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
                                    <button type="button"
                                        class="ms-auto -mx-1.5 -my-1.5 bg-yellow-100 text-yellow-600 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700
                                    btn-transition"
                                        title="Cerrar advertencia." data-dismiss-target="#alert-4"
                                        aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                            @endif

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
