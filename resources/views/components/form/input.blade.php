@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'min' => '',
    'max' => '',
    'step' => '',
    'accept' => '',
    
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        accept="{{ $accept }}"
        {{ $required ? 'required' : '' }}
        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
    />
</div>
