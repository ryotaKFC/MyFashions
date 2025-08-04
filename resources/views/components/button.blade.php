@props([
    
    'type' => 'button',         // button, submit
    'href' => null,             
    'size' => 'md',             // sm, md, lg
    'bgColor' => 'bg-base',  
    'textColor' => 'white',     // black, white
])

@php
$base = 'font-bold rounded-lg cursor-pointer';
$hover = 'hover:opacity-70';
$textColorClass = match($textColor) {
    'black' => 'text-black',
    default => 'text-white',
};

$sizeClass = match($size) {
    'sm' => 'px-3 py-1 text-sm',
    'lg' => 'px-6 py-3 text-lg',
    default => 'px-4 py-2 text-base',
};

$class = "{$base} {$hover} {$bgColor} {$textColorClass} {$sizeClass}";
@endphp

@if ($href)
    <a href="{{ $href }}" class = '{{ $class }}'>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class = '{{ $class }}'>
        {{ $slot }}
    </button>
@endif
