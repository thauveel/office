@props(['name'])

<img {{ $attributes->merge(['class' => 'rounded-full']) }} src="https://ui-avatars.com/api/?name={{ $name }}&background=06113C&color=fff&bold=true" alt="">