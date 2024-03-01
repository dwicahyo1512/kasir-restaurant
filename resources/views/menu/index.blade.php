<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/menu">
            Menu
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <Link href="#refund-info"
                    class="px-4 py-2 bg-gray-100 rounded-md text-sm border flex items-center gap-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                Add New Menu
                </Link>
            </div>
            <x-splade-modal name="refund-info" class="space-x-3">
                <x-splade-form action="{{ route('menu.store') }}">
                    <div class="max-w-lg mx-auto space-y-4">
                        <label for="img_menu" class="italic text-red-400">*rekomendasi img 250px*</label>
                        <x-splade-file name="img_menu" :show-filename="false" placeholder="Gambar menu" filepond preview />
                        <x-splade-input name="nama_menu" placeholder="Nama Menu" />
                        <x-splade-select name="kategori" :options="$kategoris" option-label="nama kategori"
                            placeholder="Select Kategori" choices />
                        <x-splade-input name="harga_menu" placeholder="Harga Menu" />
                        <x-splade-textarea name="keterangan_menu" placeholder="Menu Keterangan" jodit />
                        <x-splade-checkbox name="status" value="1" false-value="0" label="Status" />
                        <x-splade-submit label="save" :spinner="true" />
                    </div>
                </x-splade-form>
            </x-splade-modal>
            <x-splade-table :for="$menu" class="py-5">
                <x-slot:empty-state>
                    <p class="flex text-center justify-center text-red-500">There are no items to show</p>
                </x-slot>
                <x-splade-cell status as="$menu">
                    <tr>
                        {{ $menu->status == 1 ? 'ada' : 'habis' }}
                    </tr>
                </x-splade-cell>
                <x-splade-cell image as="$menu">
                    <img src="{{ asset('/storage/menu_img/' . $menu->img_menu) }}" class="rounded-md w-1/3" />
                </x-splade-cell>
                <x-splade-cell actions as="$menu" class="">
                    <Link modal href="/menu/{{ $menu->id }}/edit" class="p-2 bg-blue-400 text-white rounded-lg">Edit
                    </Link>
                    <x-splade-form action="{{ route('menu.destroy', $menu) }}" method="delete" confirm="Delete menu"
                        confirm-text="Are you sure you want to delete your menu?"
                        confirm-button="Yes, delete this menu!" cancel-button="No, I want to stay!">
                        <x-splade-button class="p-4 bg-red-500 text-white rounded-lg">Delete</x-splade-button>
                    </x-splade-form>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>

</x-app-layout>
