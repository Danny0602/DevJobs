
    <form wire:submit.prevent="editarVacante" class="md:w-1/2 space-y-5">


        <div>
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />

            <x-text-input wire:model='titulo' id="titulo" class="block mt-1 w-full" type="text"
                :value="old('titulo')" />

            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="salario" :value="__('Salario Mensual')" />

            <select
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                wire:model="salario" id="salario">
                <option value="">-- Seleccione --</option>
                @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>

                @endforeach
            </select>

            <x-input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />

            <select
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                wire:model="categoria" id="categoria">
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach

            </select>

            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />

            <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa"
                :value="old('empresa')" />

            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="ultimo_dia" :value="__('Ultimo Dia para postularse')" />

            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
                :value="old('ultimo_dia')" />

            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripcion Puesto')" />

            <textarea wire:model="descripcion" id="descripcion"
                class="h-72 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">

        </textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />

            <x-text-input accept="image/*" id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" />

            <div class="my-5 w-80">
                <x-input-label for="imagen" :value="__('Imagen Actual')" />
                <img src="{{ asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen vacante ' . $titulo}}">
            </div>
            <div class="my-5 w-80">
                @if ($imagen_nueva)
                Imagen_nueva:
                <img src="{{$imagen_nueva->temporaryUrl()}}" alt="imagen temporal de subida">
                    
                @endif
            </div>
            <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3 font-black text-base">Guardar Cambios</x-primary-button>
        </div>
    </form>
