<div>
    <div class="bg-gray-900 mt-8 py-10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex flex-1 justify-between">
                <div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="w-6 h-6 stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                            Sets
                        </h2>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <x-button.add-song>Add Set</x-button.add-song>
                </div>
            </div>

            @foreach($sets as $set)
                <div class="overflow-hidden bg-gray-800 shadow sm:rounded-lg mt-8">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-xl font-semibold leading-6 text-gray-200 capitalize">{{ $set->name }}</h3>
{{--
                        <p class="mt-1 max-w-2xl text-sm text-gray-300">something</p>
--}}
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Owner</dt>
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">{{ $set->user->name }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Description</dt>
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">{{ $set->description }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Created</dt>
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">{{ $set->created_at->format('M j, Y, g:m a e') }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Updated</dt>
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">{{ $set->updated_at->format('M j, Y, g:m a e') }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Songs</dt>
                                @if($set->songs->count() > 0)
                                    <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">
                                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200"
                                            wire:sortable="updateSetOrder({{ $set->id }})"
                                        >
                                            @foreach($set->songs as $song)
                                                <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm space-x-2"
                                                    wire:sortable.item="{{ $set->id }}-{{ $song->id }}"
                                                    wire:key="set{{ $set->id }}-song-{{ $song->id }}"
                                                >
                                                    <x-icon.bars-3 class="text-gray-400"
                                                                   wire:sortable.handle
                                                    />
                                                    <div class="flex flex-1 items-center">
                                                        <div class="ml-2 flex-1 truncate">{{ $song->title }}</div>
                                                        <div class="ml-2 flex-1 truncate">{{ $song->artist }}</div>
                                                        <div class="ml-2 flex-1 truncate">{{ $song->key->getString() }}</div>
                                                    </div>

                                                    <x-button.secondary-on-dark
                                                        wire:click="removeSong({{ $set->id }},{{ $song->id }})">
                                                        Remove
                                                    </x-button.secondary-on-dark>
                                                    <x-button.link-primary-on-dark href="/song/{{ $song->id }}"> View </x-button.link-primary-on-dark>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                @else
                                    <button type="button" class="relative block w-full rounded-lg border-2 border-dashed text-gray-400 hover:text-gray-200 border-gray-400 p-12 text-center hover:border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-auto h-12 w-12">
                                            <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" />
                                            <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                                        </svg>

                                        <span class="mt-2 block text-sm font-semibold"
                                              wire:click="addSong({{ $set->id }})"
                                        >
                                            Add a Song
                                        </span>
                                    </button>

                                @endif
                            </div>

                        </dl>
                        <div class="flex justify-end mb-6 mr-6">
                            <x-button.add-song wire:click="addSong({{ $set->id }})">Add Song</x-button.add-song>
                        </div>
                    </div>
                </div>
                @endforeach

            <div class="mt-8">
                {{ $sets->links() }}
            </div>
        </div>
    </div>
</div>
