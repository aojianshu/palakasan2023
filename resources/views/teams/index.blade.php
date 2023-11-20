<x-app-layout>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <x-slot name="header">
        <div class="flex justify-between items-center content-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Team') }}
            </h2>
            <a href="{{ route('teams.create') }}">
                <x-primary-button>Add Team</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach($teams as $team)
                        <li class="flex justify-between gap-x-6 py-5">
                          <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none" src="{{ asset('assets/teams/' . $team->color . '-' . $team->name . '.png') }}" alt="">
                            <div class="min-w-0 flex-auto">
                              <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ $team->monikerName() }}</p>
                              <p class="mt-1 truncate text-xs leading-5 text-gray-500 dark:text-gray-400">{{ $team->strand }}</p>
                            </div>
                          </div>
                          <div class="hidden shrink-0 sm:flex sm:items-end gap-2">
                            <a href="{{ route('teams.edit', ['team' => $team->id]) }}" class="text-sm text-gray-900 dark:text-gray-200">
                                <x-secondary-button>Edit</x-secondary-button>
                            </a>
                            {{-- <p class="mt-1 text-xs leading-5 text-gray-500 darK:text-gray-400">Delete</time></p> --}}
                            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ 'confirm-team-deletion' . $team->id }}')">Delete</x-danger-button>
                            <x-modal name="{{ 'confirm-team-deletion' . $team->id }}" focusable>
                                <form class="p-6" action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ "Are you sure you want to delete team " . $team->monikerName() . "?" }}
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                    </p>
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete Team') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                          </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
