<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <a href="/laporan">Laporan</a>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <div class="max-w-screen-xl p-6 bg-base-100 border border-base-300 rounded-lg shadow">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Tambahkan konten laporan di sini -->
                <h2 class="text-2xl font-bold mb-6">Laporan Kasir</h2>
                <x-splade-form method="post" action="{{ route('laporan.store') }}" blob>
                    <x-splade-input name="Tanggal" label="Pilih Tanggal" date range />
                    <x-splade-submit class="mt-2" :spinner="true" />
                </x-splade-form>

            </div>
            <div class="mt-3">
                <x-splade-table :for="$pesanan">
                    <x-slot:empty-state>
                        <p class="text-center">no data!</p>
                    </x-slot>
                </x-splade-table>
            </div>
        </div>
    </div>
</x-app-layout>
