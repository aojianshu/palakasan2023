<x-app-layout>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Team ') . $team->monikerName() }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('teams.update', ['team' => $team->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="md:flex justify-between items-center gap-4">
                            <div class="w-full">
                                <x-input-label for="name" :value="__('Name')"></x-input-label>
                                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="($team->name)" required autofocus autocomplete="name"></x-text-input>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"></x-input-error>
                            </div>
                            <div class="w-full">
                                <x-input-label for="color" :value="__('Color')"></x-input-label>
                                <x-text-input id="color" name="color" type="text" class="block mt-1 w-full" :value="($team->color)" required autofocus autocomplete="color"></x-text-input>
                                <x-input-error :messages="$errors->get('color')" class="mt-2"></x-input-error>
                            </div>
                            <div class="w-full">
                                <x-input-label for="strand" :value="__('Strand')"></x-input-label>
                                <x-text-input id="strand" name="strand" type="text" class="block mt-1 w-full" :value="($team->strand)" required autofocus autocomplete="strand"></x-text-input>
                                <x-input-error :messages="$errors->get('strand')" class="mt-2"></x-input-error>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <x-primary-button class="w-2/12 justify-center">Update Team</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
