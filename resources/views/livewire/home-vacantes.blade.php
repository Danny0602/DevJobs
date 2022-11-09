<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class=" text-center font-extrabold text-gray-700  text-4xl mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white  shadow-sm rounded-lg p-6 divide-y divide-gray-500 mx-2">
                @forelse ($vacantes as $vacante)
                <div class="md:flex md:justify-between md:items-center py-5">

                    <div class="md:flex-1">
                        <a class="text-3xl font-extrabold text-gray-600" href="{{route('vacantes.show', $vacante->id)}}">{{$vacante->titulo}}</a>
                        <p class="text-base text-gray-600 mb-">{{$vacante->empresa}}</p>
                        <p class="text-sm text-gray-600 mb-">{{$vacante->categoria->categoria}}</p>
                        <p class="text-sm    text-gray-600 mb-">{{$vacante->salario->salario}}</p>
                        <p class="font-bold text-sm text-gray-600">Ultimo dia para postularse: <span class="font-normal">{{$vacante->ultimo_dia->format('d-m-Y')}}</span></p>
                    </div>
                    <div class="mt-5 md:mt-0">
                        <a  class="bg-indigo-600 block text-center p-3 text-sm uppercase text-white font-bold"
                            href="{{route('vacantes.show', $vacante->id)}}">Ver Vacante</a>
                    </div>
                </div>

                @empty
                <p class="text-sm text-gray-600 p-3 text-center">NO hay Vacantes aun</p>

                @endforelse
            </div>
        </div>

    </div>
</div>