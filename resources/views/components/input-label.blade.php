@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm text-gray-500 font-bold uppercase']) }}>
    {{ $value ?? $slot }}
</label>
