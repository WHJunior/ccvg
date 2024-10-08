<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Listagem de Eventos") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button type="button" class="mb-4" onclick="location.href='{{ url('event/create') }}'">
                        {{ __('Criar') }} &#43
                    </x-primary-button>

                    <div class="space-y-4">
                        <div class="grid grid-cols-5 gap-4 p-4 bg-gray-200 dark:bg-gray-700 rounded-lg">
                            <div class="font-semibold">Nome</div>
                            <div class="font-semibold">Descrição</div>
                            <div class="font-semibold">Data</div>
                            <div class="font-semibold">Hora</div>
                            <div class="font-semibold">Ações</div>
                        </div>

                        @foreach($events as $evento)
                            <div class="grid grid-cols-5 gap-4 p-4 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                                <a href="{{url('event')}}/{{ $evento->id }}" class="text-lg font-semibold text-black-600 dark:text-blue-400 hover:underline">
                                    {{ $evento->name }}
                                </a>
                                <div>
                                    {{ $evento->description }}
                                </div>
                                <div>
                                    {{\Carbon\Carbon::create($evento->date)->format('d/m/Y')}}
                                </div>
                                <div>
                                    {{\Carbon\Carbon::create($evento->date)->format('H:i:s')}}
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{url('event')}}/{{ $evento->id }}/edit" class="text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400">Alterar</a>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('event-excluir-{{ $evento->id }}').submit();" class="text-red-500 hover:text-red-700 dark:hover:text-red-400">Excluir</a>
                                </div>
                                <form id="event-excluir-{{ $evento->id }}" action="{{route('event.destroy',$evento->id)}}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
