<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/meja">
            Meja
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <div class="max-w-screen-xl p-6 bg-base border border-base-300 rounded-lg shadow">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="#refund-info" class="p-4 bg-accent text-white rounded-lg">
                Create
                </Link>
                <x-splade-modal name="refund-info" class="space-x-3">
                    <x-splade-form action="{{ route('meja.store') }}">
                        <div class="max-w-lg mx-auto space-y-4">
                            <x-splade-input name="meja" placeholder="Nama meja" />
                            <x-splade-input name="kode_meja" placeholder="kode meja" />
                            <x-splade-submit label="save" :spinner="true" />
                        </div>
                    </x-splade-form>
                </x-splade-modal>
                <x-splade-table :for="$meja" class="py-5">
                    <x-slot:empty-state>
                        <p class="text-center">no data!</p>
                    </x-slot>
                    <x-splade-cell status as="$menu">
                        <tr>
                            {{ $menu->status == 1 ? 'Terisi' : 'Kosong' }}
                        </tr>
                    </x-splade-cell>
                    <x-splade-cell actions as="$meja" class="">
                        <Link slideover href="/meja/{{ $meja->id }}/edit"
                            class="p-2 bg-info text-white rounded-lg">
                            Edit
                        </Link>
                        <x-splade-form action="{{ route('meja.destroy', $meja) }}" method="delete"
                            confirm="Delete meja" confirm-text="Are you sure you want to delete your meja?"
                            confirm-button="Yes, delete this meja!" cancel-button="No, I want to stay!">
                            <x-splade-button class="p-4 bg-error text-white rounded-lg">Delete</x-splade-button>
                        </x-splade-form>
                    </x-splade-cell>
                </x-splade-table>
            </div>
        </div>
    </div>
</x-app-layout>
