@props([
    'class' => '',
    'title' => null,
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-xl shadow-sm ' . $class]) }}>
    {{-- Header --}}
    @if($title || $subtitle)
        <div class="px-4 py-3 border-b border-zinc-100 dark:border-zinc-700">
            @if($title)
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    {{-- Body --}}
    <div class="p-4">
        {{ $slot }}
    </div>

    {{-- Optional Footer --}}
    @isset($footer)
        <div class="px-4 py-3 border-t border-zinc-100 dark:border-zinc-700">
            {{ $footer }}
        </div>
    @endisset
</div>
