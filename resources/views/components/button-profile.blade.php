@props(['value'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary btn-md fw-bold rounded-4 w-10']) }}>
    {{ $value ?? $slot }}
</button>
