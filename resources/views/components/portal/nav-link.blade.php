@props(['active'])

@php
$classes = ($active ?? false)
            ? 'thaana-p text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 bg-opacity-10'
            : 'thaana-p text-cyan-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
