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
                    <h1 class="text-2xl font-medium sm:-mt-5 text-center">Banners</h1>
                    <h2 class="mb-2 font-bold text-dorado text-xl sm:mt-0 mt-4">Filtros</h2>

                    <div class="flex sm:flex-row flex-col items-end sm:gap-x-2 gap-y-3 mt-2">
                        <div class="sm:w-[20%] w-full">
                            <label for="filtroProcedencia" class="text-verde font-bold">Tipo procedencia</label>
                            <select class="w-full" wire:model.live="filtroProcedencia" id="filtroProcedencia"
                                name="filtroProcedencia">
                                <option value="0">Todos</option>
                                <option value="1">Cuerpo académico UAEMéx</option>
                                <option value="2">Externos a la UAEMéx</option>
                                <option value="3">Red de investigación UAEMéx</option>
                            </select>
                        </div>

                        <div class="sm:w-[30%] w-full">
                            <label for="filtroArea" class="text-verde font-bold">Área temática</label>
                            <select class="w-full" wire:model.live="filtroArea" id="filtroArea" name="filtroArea">
                                <option value="0">Todas</option>
                                @foreach ($optionsArea as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sm:w-[48%] w-full">
                            <label for="search" class="text-verde font-bold">Buscador</label>
                            <input type="text" wire:model.live="search"
                                class="inputs-formulario-solicitudes md:mt-0 mt-2 p-2.5 w-full"
                                placeholder="Buscar por correo, espacio académico, nombre de cuerpo acádemico etc....">
                        </div>
                    </div>


                    <div class="text-end mt-3">
                        <button class="button button-limpiar-filtros" wire:click="limpiarFiltros">Limpiar
                            filtros</button>
                    </div>
                    @if ($banners->first())
                        <div class="overflow-x-auto mt-8">
                            <table class="w-full table-auto text-sm">
                                <thead>
                                    <tr>
                                        <th class="w-[5%]">#</th>
                                        <th class="w-[20%] cursor-pointer" wire:click="sort('email')">
                                            Correo electrónico<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[30%] cursor-pointer" wire:click="sort('cuerpo_grupo_red')">
                                            Nombre grupo<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[25%] cursor-pointer" wire:click="sort('espacio_procedencia')">
                                            Espacio académico<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[10%] cursor-pointer" wire:click="sort('updated_at')">
                                            Última modificación<span class="pl-1 text-verde font-bold">&#8645;</span>
                                        </th>
                                        <th class="w-[10%]">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $banner->email }}</td>
                                            <td>{{ $banner->cuerpo_grupo_red }}</td>
                                            <td>{{ $banner->espacio_procedencia }}</td>
                                            <td class="text-center">{{ $banner->registro->updated_at }}</td>
                                            <td class="text-center"> <a
                                                    href="{{ route('banner.ver', ['id' => $banner->registro->id]) }}">

                                                    <button class=" button btn-success" title="Ver">
                                                        Ver
                                                    </button>

                                                </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center text-verde text-xl font-bold mt-7 ">
                            AUN NO HAY REGISTROS O NO HAY COINSIDENCIAS CON LOS FILTROS
                        </div>
                    @endif

                    <div class="mt-7">
                        {{ $banners->links() }}
                    </div>

                    <div class="flex justify-end mt-5">
                        <button wire:click="export" class="button" title="Exportar Excel">
                            <img src="{{ 'img/iconos/icExportar.png' }}" alt="asdfadsf" class="w-8">
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
