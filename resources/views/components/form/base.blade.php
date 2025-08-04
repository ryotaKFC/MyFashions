@props([
    'action',
    'method' => 'post',
    'enctype' => '',
])


<div class="m-5 p-8 rounded-2xl shadow-md w-full max-w-md bg-base/5">
    <form method="{{ $method ?? 'POST' }}" action="{{ $action }}" enctype="{{ $enctype }}" {{ $attributes->merge(['class' => 'space-y-4']) }}>
        @csrf
        {{ $slot }}
    </form>
</div>
