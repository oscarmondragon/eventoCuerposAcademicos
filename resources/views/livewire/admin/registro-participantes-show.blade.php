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
                    <h2 class="mb-2 font-bold text-dorado text-xl sm:mt-0 mt-4">Filtros</h2>
                    <div class="flex sm:flex-row flex-col items-end gap-y-3 mt-2 sm:gap-x-1">

                        <div class="sm:w-[19%] w-full">
                            <label for="filtroProcedencia" class="text-verde font-bold">Tipo procedencia</label>
                            <select class="w-full" wire:model.live="filtroProcedencia" id="filtroProcedencia"
                                name="filtroProcedencia">
                                <option value="0">Todos</option>
                                <option value="1">Cuerpo académico UAEMéx</option>
                                <option value="2">Externos a la UAEMéx</option>
                                <option value="3">Red de investigación UAEMéx</option>
                            </select>
                        </div>
                        <div class="sm:w-[29%] w-full">
                            <label for="selectedArea" class="text-verde font-bold">Área temática</label>
                            <select name="selectedArea" id="selectedArea" class="w-full" wire:model.live="selectedArea">
                                <option value="0">Todas</option>
                                @foreach ($optionsAreas as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sm:w-[19%] w-full">
                            <label for="filtroEstatus" class="text-verde font-bold">Estatus</label>
                            <select class="w-full" wire:model.live="filtroEstatus" id="filtroEstatus"
                                name="filtroEstatus">
                                <option value="0">Todos</option>
                                <option value="1">Pendientes de revisión</option>
                                <option value="2">Aprobados</option>
                                <option value="3">Rechazados</option>
                                <option value="4">Aprobados req. factura</option>
                            </select>
                        </div>


                        <div class="sm:w-[31%] w-full">
                            <label for="search" class="text-verde font-bold">Buscador</label>
                            <input type="text" wire:model.live="search" id="search"
                                class="inputs-formulario-solicitudes p-2.5 w-full"
                                placeholder="Buscar por correo, espacio académico, nombre de cuerpo acádemico etc...">
                        </div>

                    </div>


                    <div class="w-full flex justify-end items-center gap-x-5 mt-4">
                        <div>
                            <button class="button button-limpiar-filtros" wire:click="limpiarFiltros">Limpiar
                                filtros</button>
                        </div>
                    </div>

                    @if ($registros->first())
                        <div class="overflow-x-auto mt-4">
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
                                        <th class="w-[10%] cursor-pointer" wire:click="sort('updated_at')">
                                            Última modificación<span class="pl-1 text-verde font-bold">&#8645;</span>
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
                                            <td
                                                class="text-center"@isset($registro->usuario->name)title="{{ $registro->usuario->name }}" @endisset>
                                                {{ $registro->updated_at }}</td>
                                            <td class="text-center">
                                                @if ($registro->aprobacion === null)
                                                    <span class="estatus-pendiente">Pendiente</span>
                                                @elseif($registro->aprobacion === 0)
                                                    <button type="button"
                                                        @click="$wire.dispatch('openModal', {component:'modals.observaciones-modal', arguments: {id: '{{ $registro->id }}',observaciones : '{{ $registro->observaciones }}'}})"
                                                        class="estatus-rechazado hover:-translate-y-1 hover:scale-110 duration-300"
                                                        title="Ver más.">
                                                        Rechazado
                                                    </button>
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
                        <div class="mt-7 flex sm:flex-row flex-col sm:gap-x-5 gap-y-5 items-center">
                            <div class="sm:w-4/5 w-full">
                                {{ $registros->links() }}
                            </div>
                            <div class="sm:w-1/5 w-full text-end">
                                <label for="paginador">Filas:</label>
                                <select name="paginador" id="paginador" wire:model.live="paginador">
                                    @for ($i = 5; $i <= 30; $i += 5)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="text-center text-verde text-xl font-bold mt-7 ">
                            NO HAY REGISTROS O NO HAY COINCIDENCIAS CON LOS FILTROS
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
