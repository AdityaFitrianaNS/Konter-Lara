@props(['value'])

<a {{ $attributes->merge(['data-bs-dismiss' => 'modal', 'class' => 'btn btn-md btn-secondary w-100 fw-semibold rounded-4 p-2']) }}>
    {{ $value ?? $slot }}
</a>
