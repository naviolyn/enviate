@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen']) }}>
