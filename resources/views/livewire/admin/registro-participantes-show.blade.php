<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registros') }}
        </h2>
    </x-slot>
    <div class="py-4 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">
                    <h1 class="text-2xl font-medium sm:-mt-5 text-center">
                        Registros de participantes
                    </h1>
                    <div class="flex flex-row items-end gap-y-3 mt-2">
                        <div class="w-full">
                            <h2 class="mb-2">Filtros</h2>
                            <select class="sm:w-auto w-full" wire:model.live="filtroProcedencia" id="filtroProcedencia"
                                name="filtroProcedencia">
                                <option value="0">Todos</option>
                                <option value="1">Internos</option>
                                <option value="2">Externos</option>
                            </select>
                            <select class="sm:w-auto w-full sm:mt-0 mt-4" wire:model.live="filtroEstatus"
                                id="filtroEstatus" name="filtroEstatus">
                                <option value="0">Todos</option>
                                <option value="1">Pendintes de revisión</option>
                                <option value="2">Aprobado</option>
                                <option value="3">Rechazados</option>
                            </select>

                            <select name="" id="" class="sm:w-auto w-full sm:mt-0 mt-4"
                                wire:model.live="selectedArea">
                                <option value="0">Áreas temáticas</option>
                                @foreach ($optionsAreas as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>

                            <input type="text" wire:model.live="search"
                                class="inputs-formulario-solicitudes sm:mt-0 mt-4 p-2.5 sm:w-[400px] w-full"
                                placeholder="Buscar por correo, espacio académico, nombre de cuerpo acádemico etc....">
                        </div>

                    </div>
                    <div class="w-full flex justify-end mt-4">
                        <button class="button button-limpiar-filtros" wire:click="limpiarFiltros">Limpiar
                            filtros</button>
                    </div>
                    @if ($registros->first())
                        <div class="mt-8 overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="text-sm">
                                        <th class="w-[5%]">
                                            #
                                        </th>
                                        <th class="w-[20%] cursor-pointer" wire:click="sort('email')">
                                            Correo electrónico<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[20%] cursor-pointer" wire:click="sort('cuerpo_grupo_red')">
                                            Nombre grupo<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[25%] cursor-pointer" wire:click="sort('espacio_procedencia')">
                                            Espacio académico<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[10%] cursor-pointer" wire:click="sort('tipo_solicitante')">
                                            Procedencia<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[10%] cursor-pointer" wire:click="sort('aprobacion')">
                                            Estatus<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[10%]">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    @foreach ($registros as $registro)
                                        <tr class="border-b-gray-200 border-transparent">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $registro->email }}</td>
                                            <td>{{ $registro->cuerpo_grupo_red }} </td>
                                            <td>{{ $registro->espacio_procedencia }}</td>
                                            <td class="text-center">{{ $registro->tipo_solicitante }}</td>
                                            <td class="text-center">
                                                @if ($registro->aprobacion === null)
                                                    <span class="estatus-pendiente">Pendiente</span>
                                                @elseif($registro->aprobacion === 0)
                                                    <span class="estatus-rechazado">Rechazado</span>
                                                @elseif($registro->aprobacion === 1)
                                                    <span class="estatus-aprobado">Aprobado</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('registro.revisar', ['id' => $registro->id]) }}">
                                                    <button class=" button btn-success" title="Revisar">
                                                        Revisar
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center text-verde text-xl font-bold mt-7 ">
                            NO HAY REGISTROS
                        </div>
                    @endif
                    <div class="mt-7">
                        {{ $registros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
