<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registro asistentes') }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-4 dark:text-gray-100">
                    <div>
                        <h1 class="text-2xl font-medium text-center">
                            Registro de actividades del networking
                        </h1>
                    </div>
                    <div class="mt-5">
                        <label for="areaTematica" class="mb-2 block">
                            Área temática<span class="font-bold text-red-600">*</span>
                        </label>
                        <select name="areaTematica" id="areaTematica" wire:model.live="areasTematicas">
                            @foreach ($areasTematicas as $area)
                                <option value="">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <label for="" class="mb-2 block">
                            Cuerpo Académico / Red o Grupo de Investigación / Institución Gubernamental, Social,
                            Productivo o Empresarial<span class="font-bold text-red-600">*</span>
                        </label>
                        <input type="text" name="" id="">
                    </div>

                    <div class="mt-5">
                        <p>Parte interesada</p>
                        <div class="mt-1 bg-gray-200 rounded-xl p-4 flex flex-col gap-y-5">
                            <div>
                                <label for="" class="mb-2 block">Nombre completo</label>
                                <input type="text" name="" id="">
                            </div>

                            <div>
                                <label for="" class="mb-2 block">Institución</label>
                                <input type="text" name="" id="">
                            </div>

                            <div>
                                <label for="" class="mb-2 block">Puesto</label>
                                <input type="text" name="" id="">
                            </div>

                            <div class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4">
                                <div class="sm:w-3/5 w-full">
                                    <label for="" class="mb-2 block">
                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="" id="" class="w-full">
                                </div>

                                <div class="sm:w-2/5 w-full">
                                    <label for="" class="mb-2 block">
                                        Teléfono<span class="font-bold text-red-600">*</span>
                                    </label>
                                    <input type="text" name="" id="" class="w-full">
                                </div>
                            </div>

                            <div>
                                <label for="" class="mb-2 block">Sector</label>
                                <select name="" id="">
                                    <option value="">Selecciona una opción</option>
                                </select>
                            </div>

                            <div>
                                <label for="" class="mb-2 block">Descripción o nombre del sector</label>
                                <input type="text" name="" id="">
                            </div>

                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="" class="mb-2 block">
                            Comentario general<span class="font-bold text-red-600">*</span>
                        </label>
                        <textarea name="" id="" cols="30" rows="5" class="w-3/4"></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
