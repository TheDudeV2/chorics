<div class="overflow-hidden bg-gray-800 shadow sm:rounded-lg m-12">
    <div class="px-4 py-5 sm:px-6 flex justify-between align-bottom items-center">
        <div class="">
            <h3 class="text-xl font-semibold leading-6 text-gray-200">{{ $this->song->title }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-400">{{ $this->song->artist }}</p>
        </div>
        <div class="flex items-center text-gray-200 space-x-8">
            <div class="space-x-4">
                <x-secondary-button wire:click="cancel">cancel</x-secondary-button>
                <x-button wire:click="save">save</x-button>
            </div>
            <span class="text-2xl font-bold text-gray-200">Key: {{ $this->song->key->getString() }}</span>
            <span class="grid grid-cols-1 gap-1">
                <x-icon.arrow-up-circle wire:click="transposeUp"/>
                <x-icon.arrow-down-circle wire:click="transposeDown"/>
            </span>
        </div>
    </div>

    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <div class="text-xl font-extralight text-gray-200">
            {{ $this->song->lyrics }}
        </div>
    </div>



    <div class="flex flex-col justify-center m-6 p-6 rounded-xl bg-gray-700">
        @livewire('editorjs', [
            'editorId' => "songEditor",
            'value' => $json,
            'class' => '...',
            'style' => '...',
            'readOnly' => false,
            'placeholder' => 'Lorem ipsum dolor sit amet'
        ])

        <div class="flex flex-row justify-end mt-4">
            <x-secondary-button wire:click="debug" class="mr-2">Debug</x-secondary-button>
            <x-secondary-button wire:click="cancel" class="mr-2">Cancel</x-secondary-button>
            <x-button wire:click="save">Save</x-button>
        </div>
    </div>

</div>
