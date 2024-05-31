<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-verde dark:text-gray-200 leading-tight">
            {{ __('Banners') }}
        </h2>
    </x-slot>
    <div class="py-4 text-textos">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 dark:text-gray-100">

                    <div class="flex flex-wrap items-end gap-2 sm:-mt-7">
                        <div class="sm:w-3/3">
                            <h1>Banners</h1>
                            <select class="sm:w-auto w-full" wire:model.live="filtroProcedencia" id="filtroProcedencia"
                                name="filtroProcedencia">
                                <option value="0">Todos</option>
                                <option value="1">Internos</option>
                                <option value="2">Externos</option>
                            </select>

                            <select class="sm:w-auto w-full" wire:model.live="filtroArea" id="filtroArea"
                                name="filtroArea">
                                <option value="0">Todas</option>
                                @foreach ($optionsArea as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $banner->email }}</td>
                                        <td>{{ $banner->cuerpo_grupo_red }}</td>
                                        <td>{{ $banner->espacio_procedencia }}</td>
                                        <td>{{ $banner->registro->tipo_solicitante }}</td>
                                        <td> <a href="{{ route('banner.ver', ['id' => $banner->registro->id]) }}">

                                                <button class=" button btn-success" title="Ver">
                                                    Ver
                                                </button>

                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $banners->links() }}

                    <x-secondary-button wire:click="export" class="ms-3">
                        {{ __('Exportar') }}
                    </x-secondary-button>

                </div>
            </div>
        </div>
    </div>
</div>
