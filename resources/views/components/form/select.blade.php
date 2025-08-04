@props([
    'name',
    'label',
    'options' => [],
    'placeholder' => '選択してください',
    'required' => false
])
<dt>{{ $label }} @if($required)<span class="text-red-500">*</span>@endif</dt>
<dd>
    <select name="{{ $name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option }}" {{ old($name) == $option ? 'selected' : ''}}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</dd>
