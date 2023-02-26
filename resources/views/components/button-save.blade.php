@props(['value'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-md btn-primary w-100 my-1 fw-semibold rounded-4 p-2']) }}>
    {{ $value ?? $slot }}
</button>
