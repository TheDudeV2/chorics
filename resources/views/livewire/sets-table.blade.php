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
                                <dd class="mt-1 text-sm text-gray-200 sm:col-span-2 sm:mt-0">
                                    <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                        @foreach($set->songs as $song)
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm space-x-2">
                                                <x-icon.bars-3 class="text-gray-400"/>
                                                <div class="flex w-0 flex-1 items-center">
                                                    <span class="ml-2 w-0 flex-1 truncate">{{ $song->title }}</span>
                                                    <span class="ml-2 w-0 flex-1 truncate">{{ $song->artist }}</span>
                                                    <span class="ml-2 w-0 flex-1 truncate">{{ $song->key->getString() }}</span>
                                                </div>
                                                <x-button.secondary-on-dark> Remove </x-button.secondary-on-dark>
                                                <x-button.link-primary-on-dark href="/song/{{ $song->id }}"> View </x-button.link-primary-on-dark>
                                            </li>
                                        @endforeach
                                    </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                @endforeach

            <div class="mt-8">
                {{ $sets->links() }}
            </div>
        </div>
    </div>
</div>
