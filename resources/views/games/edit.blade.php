<x-app-layout>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Game') . $game->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('games.update', [ 'game' => $game->id] ) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="md:flex justify-between items-center gap-4">
                            <div class="w-full">
                                <x-input-label for="name" :value="__('Name')"></x-input-label>
                                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="($game->name)" required autofocus autocomplete="name"></x-text-input>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"></x-input-error>
                            </div>
                            <div class="w-full">
                                <x-input-label for="category" :value="__('Category')"></x-input-label>
                                {{-- <x-text-input id="color" name="color" type="text" class="block mt-1 w-full" :value="old('color')" required autofocus autocomplete="color"></x-text-input> --}}
                                <select class="w-full appearance-none border-gray-600 focus:border-gray-600 focus:ring-gray-600 rounded-md shadow-sm bg-gray-800 text-gray-400" name="category" id="category" class="block mt-1 w-full" required autofocus autocomplete="category">
                                    <option value="minor" @if($game->category === 'minor') selected @endif>Minor</option>
                                    <option value="major" @if($game->category === 'major') selected @endif>Major</option>
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2"></x-input-error>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <x-primary-button class="w-2/12 justify-center">Update Game</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

