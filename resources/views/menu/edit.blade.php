<x-splade-modal>

    <x-splade-form class="space-y-4" action="{{ route('menu.update', $menu) }}" :default="[
        'image_menu' => $image_menu,
        'nama' => $menu->nama_menu,
        'harga' => $menu->harga_menu,
        'keterangan' => $menu->keterangan_menu,
        'status' => $menu->status,
    ]" method="put">
        <label for="image_menu" class="italic text-red-400">*rekomendasi img 250px*</label>
        <x-splade-file name="image_menu" filepond preview />
        <x-splade-input name="nama" label="Name" />
        <x-splade-input name="harga" label="Harga" />
        <x-splade-textarea name="keterangan" autosize label="keterangan" />
        <x-splade-checkbox name="status" value="1" false-value="0" label="Status" />
        <x-splade-submit label="Update" :spinner="true" />
    </x-splade-form>

</x-splade-modal>
