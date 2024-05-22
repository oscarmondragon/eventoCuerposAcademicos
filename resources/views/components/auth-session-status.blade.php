@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'bg-green-100 text-start p-2 font-medium border-l-4 border-green-600  text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
