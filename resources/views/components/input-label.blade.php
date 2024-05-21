@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-textos dark:text-gray-300']) }}>
    {{ $value ?? $slot }}<span class="font-bold text-red-600">*</span>
</label>
