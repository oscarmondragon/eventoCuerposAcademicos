<div class="grid h-[572px] items-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-transparent p-6 overflow-hidden sm:rounded-lg">
            <div class="flex my-auto rounded-3xl bg-gray-200 text-textos p-5 shadow-sm-light shadow-verde">
                <div class="basis-1/4 my-auto bg-[#34778A]/30 -mt-5 -mb-5 -ml-5 rounded-l-3xl flex items-center">
                    <img src="{{ asset('img/iconos/icSuccess.png') }}" alt="Icono Success"
                        class="w-24 h-24 mx-auto drop-shadow-xl shadow-blue-500">
                </div>
                <div class="basis-3/4 text-center mx-auto py-auto">
                    <div class="px-20 text-lg">
                        <h1 class="font-bold text-2xl text-verde">
                            ¡Registro exitoso!
                        </h1>
                        <p>
                            @if (session()->has('success'))
                                {{ session('success') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
