<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro de interesados') }}
        </h2>
    </x-slot>
    <div x-data="{ open: false, otro: $wire.entangle('form.otroMotivo') }" class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-4 dark:text-gray-100">
                    <div>
                        <h1 class="text-2xl font-medium text-center">
                            Registro de actividades del networking
                        </h1>
                    </div>

                    <div>
                        <form wire:submit.prevent="save" id="form">
                            <div class="mt-5">
                                <label for="cuerpoAcademico" class="mb-2 block">
                                    Cuerpo Académico / Red o Grupo de Investigación / Institución Gubernamental, Social,
                                    Productivo o Empresarial<span class="font-bold text-red-600">*</span>
                                </label>
                                <input type="text" name="cuerpoAcademico" id="cuerpoAcademico" class="w-full"
                                    wire:model.live="form.cuerpoAcademico"
                                    placeholder="Cuerpo académico, red o grupo de investigación" />
                                <x-input-error :messages="$errors->get('form.cuerpoAcademico')" class="mt-1" />
                            </div>

                            <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5 mt-5">
                                <div class="md:w-2/5 w-full">
                                    <label for="areaTematica" class="mb-2 block">
                                        Área temática<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <select name="areaTematica" id="areaTematica" wire:model.live="form.areaTematica"
                                        class="w-full">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($areasTematicas as $area)
                                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('form.areaTematica')" class="mt-1" />
                                </div>

                                <div class="md:w-3/5 w-full">
                                    <label for="representanteContacto" class="mb-2 block">
                                        Representante que establece contacto<span
                                            class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="representanteContacto" id="representanteContacto"
                                        class="w-full" wire:model.live="form.representanteContacto"
                                        placeholder="Representante que establece contacto" />
                                    <x-input-error :messages="$errors->get('form.representanteContacto')" class="mt-1" />
                                </div>
                            </div>
                            <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5 mt-5">
                                {{-- Motivo --}}
                                <div class="md:w-3/5 w-full">
                                    <p class="mb-2">
                                        Motivo<span class="font-bold text-red-600">*</span>
                                    </p>
                                    <button type="button" @click="open = ! open"
                                        class="border border-verde p-2 rounded-md text-start bg-blanco w-full flex items-center justify-between focus:border-verde focus:outline-none focus:ring-1 ring-verde">
                                        Selecciona una o varias opciones
                                        <svg class="w-3 h-3 ms-2.5 mr-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <div id="formElement" x-show="open"
                                        class="bg-blanco rounded-md rounded-t-none w-full">
                                        <ul class="flex flex-col gap-y-1">
                                            <li>
                                                @foreach ($motivosInteresados as $motivo)
                                                    <div
                                                        class="flex gap-x-2 items-center select-none hover:bg-gray-200 p-1 px-4">
                                                        <input type="checkbox" class="inputMotivo" name="group[]"
                                                            id="{{ $motivo }}" class="block"
                                                            wire:click="addMotivo('{{ $motivo }}')" />
                                                        <label for="{{ $motivo }}" class="w-full block">
                                                            {{ $motivo }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <x-input-error :messages="$errors->get('form.motivos')" class="mt-1" />

                                    <div x-show="otro" class="ml-5 mt-5">
                                        <label for="descripcionMotivo" class="mb-2 block">
                                            Especificar motivo<span class="font-bold text-red-600">*</span>
                                        </label>
                                        <input type="text" name="descripcionMotivo" id="descripcionMotivo"
                                            wire:model.live="form.descripcionMotivo" class="w-full"
                                            placeholder="Especificar el motivo" />
                                        <x-input-error :messages="$errors->get('form.descripcionMotivo')" class="mt-1" />
                                    </div>
                                </div>

                                <div class="md:w-2/5 w-full">
                                    <label for="interes" class="block mb-2">
                                        Interés<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <select name="interes" id="interes" wire:model.live="form.interes" class="w-full">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($intereses as $interes)
                                            <option value="{{ $interes }}"> {{ $interes }} </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('form.interes')" class="mt-1" />
                                </div>
                            </div>

                            {{-- Parte interesada --}}
                            <div class="mt-8">
                                <p>Parte interesada</p>
                                <div class="mt-1 bg-gray-100 rounded-xl p-5 flex flex-col gap-y-5">

                                    <div>
                                        <label for="institucion" class="mb-2 block">
                                            Institución<span class="font-bold text-red-600">*</span>
                                        </label>
                                        <input type="text" name="institucion" id="institucion"
                                            wire:model.live="form.institucion" class="w-full"
                                            placeholder="Institución" />
                                        <x-input-error :messages="$errors->get('form.institucion')" class="mt-1" />
                                    </div>

                                    <div class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">

                                        <div class="md:w-2/5 w-full">
                                            <label for="puesto" class="mb-2 block">
                                                Puesto<span class="font-bold text-red-600">*</span>
                                            </label>
                                            <input type="text" name="puesto" id="puesto"
                                                wire:model.live="form.puesto" class="w-full" placeholder="Puesto" />
                                            <x-input-error :messages="$errors->get('form.puesto')" class="mt-1" />
                                        </div>

                                        <div class="md:w-3/5 w-full">
                                            <label for="nombreInteresado" class="mb-2 block">
                                                Nombre completo del interesado<span
                                                    class="font-bold text-red-600">*</span>
                                            </label>
                                            <input type="text" name="nombreInteresado" id="nombreInteresado"
                                                wire:model.live="form.nombreInteresado" class="w-full"
                                                placeholder="Nombre interesado" />
                                            <x-input-error :messages="$errors->get('form.nombreInteresado')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div class="flex md:flex-row flex-col md:gap-x-4 gap-y-4">
                                        <div class="md:w-3/5 w-full">
                                            <label for="email" class="mb-2 block">
                                                Correo electrónico<span class="font-bold text-red-600">*</span>
                                            </label>

                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4  dark:text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 16">
                                                        <path
                                                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                        <path
                                                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                    </svg>
                                                </div>
                                                <input type="text" name="email" id="email"
                                                    wire:model.live="form.email" class="w-full ps-10 p-2.5"
                                                    placeholder="Correo electrónico" />
                                            </div>
                                            <x-input-error :messages="$errors->first('form.email')" class="mt-1" />
                                        </div>

                                        <div class="md:w-2/5 w-full">
                                            <label for="telefono" class="mb-2 block">
                                                Teléfono<span class="font-bold text-red-600">*</span>
                                            </label>

                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none justify-between w-full">
                                                    <div class="basis-1/4">
                                                        <svg class="w-4 h-4" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 19 18">
                                                            <path
                                                                d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" name="telefono" id="telefono"
                                                    wire:model.live="form.telefono" class="w-full ps-10 p-2.5 pr-14"
                                                    placeholder="Teléfono" />
                                            </div>


                                            <x-input-error :messages="$errors->get('form.telefono')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div x-data="{ sector: $wire.entangle('form.sector') }" class="flex md:flex-row flex-col md:gap-x-5 gap-y-5">
                                        <div class="md:w-1/4 w-full">
                                            <label for="sector" class="mb-2 block">
                                                Sector<span class="font-bold text-red-600">*</span>
                                            </label>

                                            <select name="sector" id="sector" wire:model.live="form.sector"
                                                class="w-full">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($sectores as $sector)
                                                    <option value="{{ $sector }}"> {{ $sector }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('form.sector')" class="mt-1" />
                                        </div>

                                        <div x-show="sector == 'Otro' " class="md:w-3/4 w-full">
                                            <label for="descripcionSector" class="mb-2 block">Especificar sector<span
                                                    class="font-bold text-red-600">*</span>
                                            </label>
                                            <input type="text" name="descripcionSector" id="descripcionSector"
                                                wire:model.live="form.descripcionSector" class="w-full"
                                                placeholder="Nombre del sector" />
                                            <x-input-error :messages="$errors->get('form.descripcionSector')" class="mt-1" />
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="sm:w-3/5 w-full mt-5">
                                <label for="comentario" class="mb-2 block">
                                    Comentario general
                                </label>
                                <textarea name="comentario" id="comentario" wire:model.live="form.comentario" cols="30" rows="5"
                                    class="w-full" placeholder="Comentario general..."></textarea>
                                <x-input-error :messages="$errors->get('form.comentario')" class="mt-1" />
                            </div>
                            <div class="sm:text-end mt-5">
                                <button type="button" @click="$wire.limpiarCampos; reset(); open = false"
                                    class="button btn-warning">Limpiar
                                    campos</button>
                                <button type="submit" class="button btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() { // resetea los inputs de motivos al cargar la pagina
            this.reset();
        };

        function reset() { // resetea inputs de motivos
            document.querySelectorAll('#formElement input[type=checkbox]').forEach(function(checkElement) {
                checkElement.checked = false;
            });
        }

        telefono.addEventListener('keyup', (e) => {
            let valorInput = e.target.value;
            telefono.value = valorInput
                .replace(/[^0-9()+]/g, '')
                .replace(/\s/g, '');
        });
    </script>
</div>
