<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Banners') }}
        </h2>
    </x-slot>
    <div class="py-4 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-center flex justify-center dark:text-gray-100">
                    <div class="border-2 border-verde/50 p-6 sm:w-3/4 w-full">
                        <h1 class="text-2xl font-medium text-center">
                            Banner
                        </h1>
                        <div class="mt-8">
                            <label class="label-titulo">Institución de procedencia: </label>
                            <p>{{ $registro->banner->espacio_procedencia }}</p>
                        </div>

                        <div class="mt-8">
                            <label class="label-titulo">Cuerpo Académico: </label>
                            <p>{{ $registro->banner->cuerpo_grupo_red }}</p>
                        </div>

                        <div class="mt-8">
                            <label class="label-titulo">Área temática: </label>
                            <p>{{ $registro->banner->area_tematica }}</p>
                        </div>

                        <div class="mt-8">
                            <label class="label-titulo">Descripción de su principal línea de generación: </label>
                            <p>{{ $registro->banner->descripcion_linea }} </p>
                        </div>

                        <div class="mt-8">
                            <div>
                                <ul>
                                    @foreach ($registro->integrantes as $lider)
                                        @if ($lider->tipo == 'Lider')
                                            @once
                                                <label class="label-titulo">Lider:</label>
                                            @endonce
                                            <li>
                                                {{ $lider->grado_academico_abreviado . ' ' . $lider->nombre . ' ' . $lider->apellido_paterno . ' ' . $lider->apellido_materno }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-5">
                                <ul>
                                    @foreach ($registro->integrantes as $integrante)
                                        @if ($integrante->tipo == 'Integrante')
                                            @once
                                                <label class="label-titulo">Integrantes:</label>
                                            @endonce
                                            <li>
                                                {{ $integrante->grado_academico_abreviado . ' ' . $integrante->nombre . ' ' . $integrante->apellido_paterno . ' ' . $integrante->apellido_materno }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-5">
                                <ul>
                                    @foreach ($registro->integrantes as $colaborador)
                                        @if ($colaborador->tipo == 'Colaborador')
                                            @once
                                                <label class="label-titulo">Colaboradores:</label>
                                            @endonce
                                            <li>
                                                {{ $colaborador->grado_academico_abreviado . ' ' . $colaborador->nombre . ' ' . $colaborador->apellido_paterno . ' ' . $colaborador->apellido_materno }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="mt-12">
                            <label class="text-xl font-medium underline decoration-2 decoration-verde">Contacto</label>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:gap-x-4 gap-y-4 mt-5">
                            <div class="sm:w-2/5 w-full">
                                <label class="label-titulo">Teléfono:</label>
                                <span>{{ $registro->banner->telefono }}</span>
                            </div>

                            <div class="sm:w-3/5 w-full">
                                <label class="label-titulo">Correo electrónico:</label>
                                <span>{{ $registro->banner->email }}</span>
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
                <div class="flex justify-end mr-10 mb-5">
                    <a href="{{ route('banners') }}">
                        <x-secondary-button type="button">Regresar</x-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
