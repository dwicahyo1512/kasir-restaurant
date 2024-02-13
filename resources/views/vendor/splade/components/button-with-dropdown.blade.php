<x-splade-component is="dropdown" {{ $attributes->class('w-full bg-base-100 border border-base-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-base-content hover:bg-base focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-content') }}>
    <x-slot:trigger>
        {{ $button }}
    </x-slot:trigger>

    <div class="mt-2 min-w-max rounded-md shadow-lg bg-base-100 ring-1 ring-black ring-opacity-5">
        {{ $slot }}
    </div>
</x-splade-component>
