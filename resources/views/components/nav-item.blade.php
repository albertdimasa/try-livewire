@props(['active' => false])

@php($classes = $active ?? false ? 'nav-link active' : 'nav-link')

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
