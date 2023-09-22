@props(['active' => false, 'add' => ''])

@php($classes = $active ?? false ? "nav-link active $add" : "nav-link $add")

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
