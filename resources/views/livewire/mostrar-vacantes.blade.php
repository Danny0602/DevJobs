<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)


        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3 ">
                <a class="font-bold text-xl" href="{{route('vacantes.show', $vacante->id)}}">{{$vacante->titulo}}</a>


                <p class="font-bold text-sm text-gray-600">{{$vacante->empresa}}</p>
                <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>

            <div class="flex flex-col items-stretch gap-3  mt-5 md:mt-0 md:flex-row">
                <a href="{{route('candidatos.index',$vacante)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-center text-white  text-xs  font-bold">{{$vacante->candidatos->count()}} Candidatos</a>
                <a href="{{route('vacantes.edit', $vacante->id)}}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-center text-white  text-xs  font-bold">Editar</a>
                <a wire:click="$emit('eliminar',{{$vacante->id}})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-center text-white  text-xs  font-bold">Eliminar</a>

            </div>
        </div>

        @empty
        <p class="font-bold text-center p-3 text-gray-600">No tienes vacantes creadas, registra una nueva vacante</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{$vacantes->links()}}
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('eliminar', vacanteId => {
            Swal.fire({
            title: 'Deseas eliminar una vacante?',
            text: "No podras volver a recuperar la informacion de la vacante!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarVacante',vacanteId);
                Swal.fire(
                'Eliminada!',
                'Se ha borrado de forma permanente',
                'success'
                )
            }
            })
        })
        
    </script>


    @endpush
</div>