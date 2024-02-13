@props(['active', 'as' => 'Link'])

@php
$classes = ($active ?? false)
? 'text-primary bg-primary-content border-r-8 border-primary transition-transform duration-500 transform hover:scale-110'
: 'border-primary transition-transform duration-500 transform hover:scale-110';
@endphp



<{{ $as }} {{ $attributes->class($classes) }}>
    {{ $slot }}
</{{ $as }}>
