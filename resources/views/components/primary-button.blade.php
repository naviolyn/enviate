<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center text-white focus:ring-4 focus:ring-amber-300 font-medium text-sm px-6 py-2 focus:outline-none bg-amber-500 rounded-full transition duration-200 ease-in-out whitespace-nowrap h-fit w-full']) }}>
    {{ $slot }}
</button>
