@php
    $method = $attributes->get('method', 'GET');
    if ($method !== 'GET' && $method !== 'POST' ) {
        $attributes['method'] = 'POST';
    }
@endphp

<form {{ $attributes(["class" => "max-w-2xl mx-auto space-y-6", "method" => "POST"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
