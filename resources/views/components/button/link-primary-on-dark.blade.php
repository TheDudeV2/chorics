<a {{ $attributes->merge(['class' => 'rounded bg-indigo-500 py-1 px-2 text-xs font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500']) }}>
    <div class="flex items-center">
        {{ $slot }}
    </div>
</a>
