<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block rounded-md bg-indigo-500 py-2 px-3 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500']) }}>
<div class="flex items-center">
        <x-icon.document-plus class="mr-3"/>
        {{ $slot }}
    </div>

</button>
