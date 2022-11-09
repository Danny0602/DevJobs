<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))

            <div class="uppercase bg-green-100 border border-green-600 text-green-600 p-2 font-bold my-3">

                {{ session('message') }}

            </div>

            @endif
            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>