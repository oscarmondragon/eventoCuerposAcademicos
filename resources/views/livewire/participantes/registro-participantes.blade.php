<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro participantes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100">
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
                            class="ms-auto -mx-1.5 -my-1.5 bg-verde/60 text-color_primary rounded-lg focus:ring-2 focus:ring-verde p-1.5 hover:bg-verde inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
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
                                <label for="tipo_registro"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Selecciona procedencia<span class="font-bold text-red-600">*</span>
                                </label>
                                <select id="tipo_registro" x-on:click="open = ! open" x-model="selectedRegistro"
                                    wire:model.live="form.tipo_registro"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="0">Seleccione una opción</option>
                                    <option value="1">Interno a la UAEMex</option>
                                    <option value="2">Externo a la UAEMex</option>
                                </select>
                            </div>

                            <div {{-- x-show="selectedRegistro != 0" --}} class="mt-4">
                                <div id="accordion-open" data-accordion="open">
                                    <h2 id="accordion-open-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium bg-blanco rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-1 focus:ring-dorado dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
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
                                                <label for="small-input"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Nombre del Cuerpo Académico, red o grupo de investigación<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <input type="text" id="small-input"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="nombre" value="Facultad de Ciencias">
                                            </div>
                                            <div class="sm:flex flex-row items-center gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-3/4 w-full">
                                                    <label for="small-input"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Nombre completo de la universidad, dependencia o departamento de
                                                        adcripción<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="Universidad Autónoma del Estado de México">
                                                </div>

                                                <div class="flex-initial sm:w-1/4 w-full sm:mt-0 mt-5">
                                                    <label for="small-input"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Pais procedente<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    {{-- <input type="text" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                                                    <select name="" id=""
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                                </div>
                                            </div>

                                            <div class="sm:flex flex-row items-center gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <label for="tipo_registro"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Área temática<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select id="tipo_registro" x-on:click="open = ! open"
                                                        x-model="selectedRegistro"
                                                        wire:model.live="form.tipo_registro"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="0">Seleccione una opción</option>
                                                        <option value="1">Desarrollo Sostenible</option>
                                                        <option value="2">Desarrollo Humano</option>
                                                    </select>
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <label for="tipo_registro"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Subárea temática<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <select multiple id="tipo_registro" x-on:click="open = ! open"
                                                        x-model="selectedRegistro"
                                                        wire:model.live="form.tipo_registro"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="0">Seleccione una opción</option>
                                                        <optgroup label="Erradicación de la Pobrezas">
                                                            <option value="Azul">Acceso a recursos básicos.</option>
                                                            <option value="Rojo">Microfinanzas y desarrollo económico
                                                                local
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Seguridad Alimentaria">
                                                            <option value="Azul">Agricultura sostenible.</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <div class="flex items-center">
                                                    <h2>Lineas de generación y aplicacion del conocimiento<span
                                                            class="font-bold text-red-600 mr-2">*</span></h2>
                                                    <button type="button"
                                                        class="bg-verde text-white text-xl rounded-full px-4 py-2"
                                                        wire:click="$dispatch('openModal', {component: 'modals.lineas-modal'})">
                                                        +
                                                    </button>
                                                </div>

                                                <div class="overflow-x-auto mt-5">
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
                                                            <tr class="border border-b-gray-50 border-transparent">
                                                                <td>Epistemologías, metodologías y nuevos saberes</td>
                                                                <td>Esta línea o campo de investigación se centra en el
                                                                    debate referido a la producción del conocimiento y
                                                                    tiene
                                                                    varios ejes de reflexión: uno de carácter histórico
                                                                    sobre el desarrollo del pensamiento crítico
                                                                    feminista, otro de carácter epistemológico que se
                                                                    refiere a
                                                                    teorías, conceptos y paradigmas dentro de los
                                                                    estudios de género y a la contribución de éstos al
                                                                    desarrollo de las
                                                                    ciencia sociales y humanas, el tercer eje cuestiona
                                                                    a las teorías y debates hegemónicos e incluye nuevos
                                                                    discursos y
                                                                    saberes sobre subalternidad en relación a la
                                                                    producción de
                                                                    conocimientos que se articulan dentro de movimientos
                                                                    sociales y que habían sido excluidos hasta ahora.
                                                                </td>
                                                                <td>
                                                                    <button class="btn-tablas">
                                                                        <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                            alt="Botón eliminar" title="Eliminar"
                                                                            class="ml-5">
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr class="border border-b-gray-50 border-transparent">
                                                                <td>Cuerpo, saberes y tecnologías</td>
                                                                <td>En este campo el eje que articula es el debate sobre
                                                                    el cuerpo visto desde distintas perspectivas. Una
                                                                    primera se refiere a
                                                                    la producción de los cuerpos como parte de los
                                                                    ordenamientos sociales, sus jerarquías y sus
                                                                    imaginarios; la segunda problematiza
                                                                    la influencia de la tecno-ciencia en la forma de
                                                                    reconfigurar a los cuerpos, la tercera cuestiona a
                                                                    los imaginarios de la
                                                                    representación dominantes y critica a las categorías
                                                                    de cuerpo, naturaleza, sujeto y sociedad vigentes
                                                                </td>
                                                                <td>
                                                                    <button class="btn-tablas">
                                                                        <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                            alt="Botón eliminar" title="Eliminar"
                                                                            class="ml-5">
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="mt-7">
                                                <label for="message"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Principales productos logrados<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="message" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Leave a comment...">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.</textarea>
                                            </div>

                                            <div class="mt-5">
                                                <label for="message"
                                                    class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Casos de éxito de trasnferencia<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="message" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Leave a comment...">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo.</textarea>
                                            </div>

                                            <div class="mt-5">
                                                <label for="message"
                                                    class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Proyección y propuesta de vinculación o servicios que se brindan o
                                                    proyectos para posible vinculación<span
                                                        class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="message" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Leave a comment...">Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum"</textarea>
                                            </div>

                                            <div class="sm:flex flex-row items-center gap-x-4 mt-5">
                                                <div class="flex-initial sm:w-1/2 w-full">
                                                    <label for="message"
                                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Fortalezas<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <textarea id="message" rows="4"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Fortalezas">Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar</textarea>
                                                </div>

                                                <div class="flex-initial sm:w-1/2 w-full">
                                                    <label for="message"
                                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Necesidades<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <textarea id="message" rows="4"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Necesidades">Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.</textarea>
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


                                            <div class="grid grid-cols-2 gap-x-6">
                                                <div>
                                                    <div class="flex items-end">
                                                        <label for="helper-text"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Lider
                                                        </label>
                                                        {{-- <x-secondary-button class="ms-3"
                                                        wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                        {{ __('Add') }}
                                                    </x-secondary-button> --}}
                                                        <button type="button"
                                                            class="bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
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
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas">
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

                                                <div>
                                                    <div class="flex items-end">
                                                        <label for="helper-text"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Integrantes
                                                        </label>
                                                        {{-- <x-secondary-button class="ms-3"
                                                        wire:click="$dispatch('openModal', {component: 'modals.integrantes-modal'})">
                                                        {{ __('Add') }}
                                                    </x-secondary-button> --}}
                                                        <button type="button"
                                                            class="bg-verde px-3 py-1 rounded-full text-white text-xl ml-2"
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
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Ana Karen Valdez Contreras</td>
                                                                    <td>
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_eliminar.png' }}"
                                                                                alt="Botón eliminar" title="Eliminar"
                                                                                class="ml-0">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border border-b-gray-50 border-transparent">
                                                                    <td>Sonia Solano Jimenez</td>
                                                                    <td>
                                                                        <button class="btn-tablas">
                                                                            <img src="{{ 'img/botones/btn_editar.png' }}"
                                                                                alt="Botón editar" title="Editar"
                                                                                class="">
                                                                        </button>
                                                                        <button class="btn-tablas">
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
                                            <label for="small-input"
                                                class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">
                                                Nombre del Cuerpo Académico, red o grupo de investigación<span class="font-bold text-red-600">*</span>
                                            </label>
                                            <input type="text" id="small-input"
                                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                                disabled:bg-[#e0dddd] disabled:text-[#777171] disabled:font-bold disabled:border-[#888181] disabled:cursor-not-allowed"
                                                value="Facultad de Ciencias" disabled>

                                            <div class="mt-5">
                                                <label for="small-input"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">
                                                    Integrantes
                                                </label>
                                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                                    <li>
                                                        <a href="https://flowbite.com/pro/"
                                                            class="text-blue-600 dark:text-blue-500 hover:underline">
                                                            Ana Karen Valdez Contreras
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://tailwindui.com/" rel="nofollow"
                                                            class="text-blue-600 dark:text-blue-500 hover:underline">
                                                            Erick Jonathan Ruiz Gonzales
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="mt-5">
                                                <label for="message"
                                                    class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Descripción de su principal línea de generación y aplicación del conocimiento<span class="font-bold text-red-600">*</span>
                                                </label>
                                                <textarea id="message" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Leave a comment...">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.</textarea>
                                            </div>

                                            <h2 class="mt-5">Datos de contacto</h2>
                                            <div class="sm:flex flex-row items-center gap-x-4 mt-2">
                                                <div class="flex-initial sm:w-2/5 w-full">
                                                    <label for="small-input"
                                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">
                                                        Teléfono<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Teléfono" value="722 459 88 10">
                                                </div>

                                                <div class="flex-initial sm:w-3/5 w-full">
                                                    <label for="small-input"
                                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">
                                                        Correo electrónico<span class="font-bold text-red-600">*</span>
                                                    </label>
                                                    <input type="text" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Correo electrónico" value="hectamv@uaemex.mx">
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <label for="small-input"
                                                    class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">
                                                    Redes sociales
                                                </label>
                                                <input type="text" id="small-input"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

                                            <form class="max-w-lg mx-auto">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="user_avatar">Subir comprobante de pago</label>
                                                <input
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    aria-describedby="user_avatar_help" id="user_avatar"
                                                    type="file">
                                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                    id="user_avatar_help">
                                                    Importante: Es necesario subir tu comprobante de pago para ser considerado como participante.
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <x-primary-button class="ms-3 mt-5">
                                {{ __('Enviar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
