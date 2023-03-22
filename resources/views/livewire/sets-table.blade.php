<div>
    <div class="bg-gray-900 rounded-xl mt-8 py-10">
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
                    <x-button.add-song wire:click="$toggle('showNewSetModal')">New Set</x-button.add-song>
                </div>
            </div>
            <div class="mt-8">
                {{ $sets->links() }}
            </div>

            @foreach($sets as $set)
                <div wire:key="set-{{ $set->id }}" class="overflow-hidden bg-gray-800 shadow sm:rounded-lg mt-8">
                    <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                        @unless($this->editName && $this->setIdToEditName == $set->id)
                            <h3 class="text-xl font-semibold leading-6 text-gray-200 capitalize">{{ $set->name }}</h3>
                            <x-button.secondary-on-dark wire:click="editName({{ $set }})">Edit Set Name</x-button.secondary-on-dark>
                        @else
                            <x-input.text wire:model.defer="name" class="text-xl font-semibold"/>
                            @error('name') <div class="mt-2 text-indigo-200">{{ $message }}</div> @enderror
                            <div>
                                <x-button.secondary-on-dark wire:click="cancelEditName" class="mr-2">Cancel</x-button.secondary-on-dark>
                                <x-button.primary-on-dark wire:click="saveName({{ $set->id }})">Save Set Name</x-button.primary-on-dark>
                            </div>
                        @endif
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Owner</dt>
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">{{ $set->user->name }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-400">Description</dt>
                                @unless($this->editDescription && $this->setIdToEditDescription == $set->id)
                                    <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0 flex items-center justify-between">
                                        <div>
                                            {{ $set->description }}
                                        </div>
                                        <x-button.secondary-on-dark wire:click="editDescription({{ $set }})" class="ml-4 whitespace-nowrap">Edit Description</x-button.secondary-on-dark>
                                    </dd>
                                    @else
                                    <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0 items-center justify-between">
                                        <div class="flex flex-col">
                                            <div class="flex flex-row items-start">
                                                <div class="flex-grow">
                                                    <textarea wire:model.defer="description" id="description" rows="3" class="block w-full max-w-lg rounded-md border-0 bg-gray-700 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                                                </div>
                                                <x-button.secondary-on-dark wire:click="cancelEditDescription" class="mx-2">Cancel</x-button.secondary-on-dark>
                                                <x-button.primary-on-dark wire:click="saveDescription({{ $set->id }})">Save Set Description</x-button.primary-on-dark>
                                            </div>
                                            <div>
                                                @error('description') <div class="mt-2 text-indigo-200">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </dd>
                                    @endif
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
                                    <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">
                                        @if($set->songs->count() > 0)
                                            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200"
                                                wire:sortable="updateSetOrder({{ $set->id }})"
                                            >
                                            @foreach($set->songs as $song)
                                                <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm space-x-2"
                                                    wire:sortable.item="{{ $set->id }}-{{ $song->id }}"
                                                    wire:key="set-{{ $set->id }}-song-{{ $song->id }}"
                                                >
                                                    <x-icon.bars-3 class="text-gray-400"
                                                                   wire:sortable.handle
                                                    />
                                                    <div class="flex flex-1">
                                                        <div class="ml-2 flex-1 truncate">{{ $song->title }}</div>
                                                        <div class="mr-6 flex-none truncate">{{ $song->artist }}</div>
                                                        <div class="flex-none truncate">{{ $song->key->getString() }}</div>
                                                    </div>

                                                    <x-button.secondary-on-dark
                                                        wire:click="removeSong({{ $set->id }},{{ $song->id }})">
                                                        Remove
                                                    </x-button.secondary-on-dark>
                                                    <x-button.link-primary-on-dark href="/song/{{ $song->id }}"> View </x-button.link-primary-on-dark>
                                                </li>
                                            @endforeach
                                            </ul>
                                        @else
                                            <button type="button" class="relative block grid-cols-2 w-full rounded-lg border-2 border-dashed text-gray-400 hover:text-gray-200 border-gray-400 p-12 text-center hover:border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-auto h-12 w-12">
                                                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" />
                                                    <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                                                </svg>

                                                <span class="mt-2 block text-sm font-semibold"
                                                      wire:click="addSong('{{ $set->id }}')">
                                                    Add a Song
                                                </span>
                                            </button>
                                        @endif
                                    </dd>
                            </div>

                        </dl>
                        <div class="flex justify-end mb-6 mr-6">
                            <x-button.secondary-on-dark wire:click="confirmingDeleteSet({{ $set }})" class="mr-4">Delete</x-button.secondary-on-dark>
                            <x-button.add-song wire:click="addSong('{{ $set->id }}')">Add Song</x-button.add-song>
                        </div>
                    </div>
                </div>
                @endforeach

            <div class="mt-8">
                {{ $sets->links() }}
            </div>
        </div>
    </div>

    {{-- New Set Modal --}}
    <x-dialog-modal wire:model="showNewSetModal">
        <x-slot name="title">
            Create New Set
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="createSet" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-400 sm:pt-5">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-400 sm:pt-1.5">Set Name</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <div class="flex flex-col max-w-lg rounded-md shadow-sm">
                                        <input wire:model.defer="name" type="text" id="name" class="block w-full min-w-0 flex-1 rounded-md border-0 py-1.5 bg-gray-700 text-gray-200 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('name') <div class="mt-2">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-400 sm:pt-5">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-400 sm:pt-1.5">Set Description</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <textarea wire:model.defer="description" id="description" rows="3" class="block w-full max-w-lg rounded-md border-0 bg-gray-700 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                                    @error('description') <div class="mt-2">{{ $message }}</div> @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showNewSetModal')" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="createSet" wire:loading.attr="disabled">
                Create
            </x-button>
        </x-slot>
    </x-dialog-modal>

    {{-- Delete Set Modal --}}
    <x-confirmation-modal wire:model="showDeleteSetModal">
        <x-slot name="title">
            Delete Set?
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete the set? This action cannot be undone.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showDeleteSetModal')" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteSet" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
