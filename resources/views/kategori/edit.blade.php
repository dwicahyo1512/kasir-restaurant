<x-splade-modal>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-splade-form class="space-y-4" action="{{ route('kategori.update', $kategori) }}" :default="$kategori"
                    method="put">
                    <x-splade-input name="nama_kategori" label="Name" />
                    <x-splade-textarea name="keterangan_kategori" label="keterangan" />
                    <x-splade-submit label="save" :spinner="false" />
                </x-splade-form>
            </div>
        </div>
    </div>

</x-splade-modal>
