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
                            All songs
                        </h2>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <x-button.add-song>Add Song</x-button.add-song>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Title
                                </th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-white">Artist
                                </th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-white">Key</th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-white">Created
                                </th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-white">Updated
                                </th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-white">Owner
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                            @foreach($songs as $song)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $song->title }}</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">{{ $song->artist }}</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">{{ $song->key->getString() }}</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">{{ $song->created_at->toFormattedDateString() }}</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">{{ $song->updated_at->toFormattedDateString() }}</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-300">{{ $song->getOwnerName() }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="{{ '/song/'.$song->id }}"
                                           class="text-indigo-400 hover:text-indigo-300">View<span
                                                class="sr-only">, {{ $song->title }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                {{ $songs->links() }}
            </div>
        </div>
    </div>
</div>
