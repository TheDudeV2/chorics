<button {{ $attributes->merge(['type' => 'button', 'class' => 'rounded bg-white/10 py-1 px-2 text-xs font-semibold text-white shadow-sm hover:bg-white/20']) }}>
    <div class="flex items-center">
        {{ $slot }}
    </div>
</button>
