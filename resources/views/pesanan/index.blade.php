<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-base-content leading-tight">
            {{ __('Pesanan') }}
        </h2>
    </x-slot>
    <div class="max-w-screen-xl p-6 bg-base border border-base-300 rounded-lg shadow">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-splade-table :for="$pesanan" class="py-5">
                    <x-slot:empty-state>
                        <p class="text-center">no data!</p>
                    </x-slot>
                    <x-splade-cell actions as="$pesanan" class="">
                        <Link href="/pesanan/{{ $pesanan->id }}"
                            class="p-2 bg-warning text-white rounded-lg">
                            Detail
                        </Link>
                        <x-splade-form action="{{ route('pesanan.destroy', $pesanan) }}" method="delete"
                            confirm="Delete pesanan" confirm-text="Are you sure you want to delete your pesanan?"
                            confirm-button="Yes, delete this pesanan!" cancel-button="No, I want to stay!">
                            <x-splade-button class="p-4 bg-error text-white rounded-lg">Delete</x-splade-button>
                        </x-splade-form>
                    </x-splade-cell>
                </x-splade-table>
            </div>
        </div>
    </div>
</x-app-layout>
