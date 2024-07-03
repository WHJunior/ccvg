<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                {{-- <div class="max-w-xl"> --}}
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Editar') }}
                    </h2>
                    <br>
                    <form action="{{route('course.update', $course->id)}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$course->name}}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label id="description" for="description"  :value="__('Descrição')" />
                            <x-text-input id="description" name="description" type="text" class="block mt-1 w-full" 
                            value="{{$course->description}}" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit" class="ms-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                            <x-secondary-button type="reset" class="ms-4">
                                {{ __('Limpar') }}
                            </x-secondary-button>
                        </div>
                    </form>
                    <br>
                    <a href="{{url('course/')}}">Voltar</a>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>