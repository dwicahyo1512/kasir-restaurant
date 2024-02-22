<x-splade-modal>

    <x-splade-form class="space-y-4" action="{{ route('menu.update', $menu) }}" :default="[
        'image_menu' => $image_menu,
        'nama_menu' => $menu->nama_menu,
        'kategori' => $menu->kategori_id,
        'harga_menu' => $menu->harga_menu,
        'keterangan_menu' => $menu->keterangan_menu,
        'status' => $menu->status,
    ]" method="put">
        <label for="image_menu" class="italic text-red-400">*rekomendasi img 250px*</label>
        <x-splade-file name="image_menu" filepond preview />
        <x-splade-input name="nama_menu" label="Name" />
        <x-splade-select name="kategori" :options="$kategoris" option-label="nama_kategori" label="Kategori"  choices relation />
        <x-splade-input name="harga_menu" label="Harga" />
        <x-splade-textarea name="keterangan_menu" autosize label="keterangan" />
        <x-splade-checkbox name="status" value="1" false-value="0" label="Status" />
        <x-splade-submit label="Update" :spinner="true" />
    </x-splade-form>

</x-splade-modal>
