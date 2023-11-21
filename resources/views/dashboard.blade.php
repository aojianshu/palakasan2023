<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto relative">
                        <h1 class="mb-2">Minor Games</h1>
                        <table role="table" class="w-full text-sm text-left text-gray-400">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-900">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Teams</th>
                                    @foreach($games as $game)
                                        @if($game->category === 'minor')
                                            <th scope="col" class="py-3 px-6 cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ 'minor' . $game->id }}')">{{ $game->name }}</th>
                                        @endif
                                        <x-modal name="{{ 'minor' . $game->id }}" focusable>
                                            <div class="p-6">
                                                <form action="{{ route('score') }}" method="POST">
                                                    @csrf
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                                        {{ "Score " . $game->name . " Rankings" }}
                                                    </h2>
                                                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                                                    @foreach($teams as $team)
                                                        <div class="flex justify-between content-center items-center mb-2">
                                                            <x-input-label class="w-1/4" for="score[]" :value="__($team->monikerName())"></x-input-label>
                                                            <select class="w-full appearance-none border-gray-600 focus:border-gray-600 focus:ring-gray-600 rounded-md shadow-sm bg-gray-800 text-gray-400" name="score[]" id="score[]" class="block mt-1 w-full" required autofocus autocomplete="score">
                                                                <option value="100">1st</option>
                                                                <option value="90">2nd</option>
                                                                <option value="80">3rd</option>
                                                                <option value="70">4th</option>
                                                                <option value="60">5th</option>
                                                                <option value="50">6th</option>
                                                                <option value="40">7th</option>
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Submit Ranks') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </x-modal>
                                    @endforeach
                                    <th scope="col" class="py-3 px-6">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr class="bg-gray-800 border-b border-b-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-300 whitespace-nowrap flex flex-col">
                                            {{ $team->monikerName() }}
                                        </th>
                                        @foreach($games as $game)
                                            @if($game->category === 'minor')
                                                @if(is_null($team->scores()->where('game_id', $game->id)->get()->first()))
                                                    <td class="py-4 px-6">0</td>
                                                @else
                                                    <td class="py-4 px-6">{{ $team->scores()->where('game_id', $game->id)->get()->first()->score }}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td class="py-4 px-6">{{ $team->scores()->avg('score') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto relative">
                        <h1 class="mb-2">Major Games</h1>
                        <table role="table" class="w-full text-sm text-left text-gray-400">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-900">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Teams</th>
                                    @foreach($games as $game)
                                        @if($game->category === 'major')
                                            <th scope="col" class="py-3 px-6 cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ 'major' . $game->id }}')">{{ $game->name }}</th>
                                        @endif
                                        <x-modal name="{{ 'major' . $game->id }}" focusable>
                                            <div class="p-6">
                                                <form action="{{ route('score') }}" method="POST">
                                                    @csrf
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                                        {{ "Score " . $game->name . " Rankings" }}
                                                    </h2>
                                                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                                                    @foreach($teams as $team)
                                                        <div class="flex justify-between content-center items-center mb-2">
                                                            <x-input-label class="w-1/4" for="score[]" :value="__($team->monikerName())"></x-input-label>
                                                            <select class="w-full appearance-none border-gray-600 focus:border-gray-600 focus:ring-gray-600 rounded-md shadow-sm bg-gray-800 text-gray-400" name="score[]" id="score[]" class="block mt-1 w-full" required autofocus autocomplete="score">
                                                                <option value="100">1st</option>
                                                                <option value="90">2nd</option>
                                                                <option value="80">3rd</option>
                                                                <option value="70">4th</option>
                                                                <option value="60">5th</option>
                                                                <option value="50">6th</option>
                                                                <option value="40">7th</option>
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Submit Ranks') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </x-modal>
                                    @endforeach
                                    <th scope="col" class="py-3 px-6">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr class="bg-gray-800 border-b border-b-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-300 whitespace-nowrap flex flex-col">
                                            {{ $team->monikerName() }}
                                        </th>
                                        @foreach($games as $game)
                                            @if($game->category === 'major')
                                                @if(is_null($team->scores()->where('game_id', $game->id)->get()->first()))
                                                    <td class="py-4 px-6">0</td>
                                                @else
                                                    <td class="py-4 px-6">{{ $team->scores()->where('game_id', $game->id)->get()->first()->score }}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
