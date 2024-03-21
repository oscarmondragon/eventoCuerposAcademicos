<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-success button']) }}>
    {{ $slot }}
</button>
