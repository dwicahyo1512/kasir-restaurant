<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>
    <div class="p-4 h-full sm:ml-64">
        <div
            class="max-w-screen-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Link href="#refund-info" class="p-4 bg-green-500 text-white rounded-lg">
                        Create
                        </Link>
                        <x-splade-modal name="refund-info" class="space-x-3">
                            <x-splade-form action="{{ route('kategori.store') }}">
                                <div class="max-w-lg mx-auto space-y-4">
                                    <label for="img_menu" class="italic text-red-400" >*rekomendasi img 250px*</label>
                                    <x-splade-file name="img_menu" :show-filename="false" placeholder="Gambar menu"/>
                                     <img v-if="form.img_menu" :src="form.$fileAsUrl('img_menu')" />
                                    <x-splade-input name="nama_menu" placeholder="Nama Menu" />
                                    {{-- <x-splade-select name="id_kategori" :options="$companies" option-label="name" option-value="id" /> --}}
                                    <x-splade-select name="status" placeholder="status makanan" />
                                    <x-splade-input name="harga_menu" placeholder="Harga Menu" />
                                    <x-splade-textarea name="Keterangan" placeholder="Kategori keterangan" />
                                    <x-splade-submit label="save" :spinner="true" />
                                </div>
                            </x-splade-form>
                        </x-splade-modal>
                    <x-splade-table :for="$menu" class="py-5">
                        <x-slot:empty-state>
                            <p class="text-center">no data!</p>
                        </x-slot>
                        {{-- <x-splade-cell actions as="$user" class="">
                            <x-splade-link href="{{ route('users.edit', $user) }}"
                                class="p-2 bg-blue-400 text-white rounded-lg">Edit</x-splade-link>
                            <x-splade-form action="{{ route('users.destroy', $user) }}" method="delete"
                                confirm="Delete User" confirm-text="Are you sure you want to delete your User?"
                                confirm-button="Yes, delete this User!" cancel-button="No, I want to stay!">
                                <x-splade-button class="p-4 bg-red-500 text-white rounded-lg">Delete</x-splade-button>
                            </x-splade-form>
                        </x-splade-cell> --}}
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
