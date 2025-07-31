@props([
    'type' => 'button',
    'href' => null,
    'variant' => 'primary', // primary, secondary
    'size' => 'md',         // sm, md, lg
])

@php
$base = 'inline-flex items-center justify-center font-semibold rounded-xl focus:outline-none transition duration-200';

$variants = [
    'primary' => 'bg-primary text-white hover:opacity-60',
    'danger' => 'bg-danger text-white hover:opacity-60',
    'secondary' => 'bg-white text-white hover:opacity-60', // 追加
];

$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-5 py-3 text-lg',
];

$class = "$base " . ($variants[$variant] ?? '') . " " . ($sizes[$size] ?? '');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
