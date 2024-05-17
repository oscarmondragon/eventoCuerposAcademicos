<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-warning button']) }}>
    {{ $slot }}
</button>
