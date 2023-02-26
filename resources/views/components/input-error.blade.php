@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
