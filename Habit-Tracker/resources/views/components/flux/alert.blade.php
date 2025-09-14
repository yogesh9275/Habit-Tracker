@props([
    'color' => 'blue',   // default color
    'dismissible' => false
])

@php
    $colors = [
        'blue' => 'bg-blue-100 text-blue-800 border-blue-300',
        'green' => 'bg-green-100 text-green-800 border-green-300',
        'red' => 'bg-red-100 text-red-800 border-red-300',
        'yellow' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
        'gray' => 'bg-gray-100 text-gray-800 border-gray-300',
    ];

    $classes = $colors[$color] ?? $colors['blue'];
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 rounded {$classes} flex items-start justify-between"]) }}>
    <div>
        {{ $slot }}
    </div>
    @if($dismissible)
        <button type="button" onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
    @endif
</div>
