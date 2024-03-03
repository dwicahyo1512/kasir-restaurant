<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kasir') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-2">
        <kasir-pesanan :menus="@js($menus)" :discounts="@js($discounts)"  :categories="@js($categories)"  :pesanan="@js($pesanan)" :meja="@js($meja)"  />
    </div>
</x-app-layout>
