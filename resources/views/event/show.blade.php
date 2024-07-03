<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                {{-- <div class="max-w-xl"> --}}
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Visualizar') }}
                    </h2>
                    <br>
                    <form action="{{route('event.update', $event->id)}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$event->name}}" disabled autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label id="description" for="description"  :value="__('Descrição')" />
                            <x-text-input id="description" name="description" type="text" class="block mt-1 w-full" 
                            value="{{$event->description}}" disabled autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label id="date" for="date"  :value="__('Data')" />
                            <x-text-input id="date" name="date" type="date" class="block mt-1 w-full" value="{{$event->date}}" disabled autocomplete="date" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />    
                        </div>
                    </form>
                    <br>
                    <a href="{{url('event/')}}">Voltar</a>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>