<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-base-content leading-tight">
            {{ __('Pesanan') }}
        </h2>
    </x-slot>
    <Proses-pesanan :pending="@js($pending)" :proses="@js($proses)" :done="@js($done)" />
</x-app-layout>
