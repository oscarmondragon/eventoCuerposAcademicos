<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Registros') }}
        </h2>
    </x-slot>
    <div class="py-6 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">

                    <div class="flex flex-wrap items-end gap-2 sm:-mt-7">
                        <div class="sm:w-3/3">
                            <h1>Filtros</h1>
                            <select class="sm:w-auto w-full" wire:model.live="filtroProcedencia" id="filtroProcedencia"
                                name="filtroProcedencia">
                                <option value="0">Todos</option>
                                <option value="1">Internos</option>
                                <option value="2">Externos</option>
                            </select>
                            <select class="sm:w-auto w-full" wire:model.live="filtroEstatus" id="filtroEstatus"
                                name="filtroEstatus">
                                <option value="0">Todos</option>
                                <option value="1">Pendintes de revisión</option>
                                <option value="2">Autorizados</option>
                                <option value="3">Rechazados</option>
                            </select>
                            <input type="text" wire:model.live="search"
                                class="inputs-formulario-solicitudes md:mt-0 mt-2 p-2.5 sm:w-96 w-full"
                                placeholder="Buscar por correo, espacio académico, nombre de cuerpo acádemico etc....">
                        </div>

                    </div>
                    <div class="text-end mt-3">
                        <button class="bg-blue-600" wire:click="limpiarFiltros">Limpiar filtros</button>
                    </div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Correo electrónico</th>
                                    <th>Nombre grupo</th>
                                    <th>Espacio académico</th>
                                    <th>Procedencia</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registros as $registro)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $registro->email }}</td>
                                        <td>{{ $registro->cuerpo_grupo_red }}</td>
                                        <td>{{ $registro->espacio_procedencia }}</td>
                                        <td>{{ $registro->tipo_solicitante }}</td>
                                        <td>Aprobado</td>
                                        <td> <a href="{{ route('registro.revisar', ['id' => $registro->id]) }}">

                                                <button class=" button btn-success" title="Revisar">
                                                    Revisar
                                                </button>

                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $registros->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
