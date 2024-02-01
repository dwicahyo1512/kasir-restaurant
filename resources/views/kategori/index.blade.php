<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
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
                                <x-splade-input name="kategori" placeholder="Nama Kategori" />
                                <x-splade-textarea name="Keterangan" placeholder="Kategori keterangan" />
                                <x-splade-submit label="save" :spinner="true" />
                            </div>
                        </x-splade-form>
                    </x-splade-modal>
                    <x-splade-table :for="$kategori" class="py-5">
                        <x-slot:empty-state>
                            <p class="text-center">no data!</p>
                        </x-slot>
                        <x-splade-cell actions as="$kategori" class="">
                            <x-splade-link href="{{ route('kategori.edit', $kategori) }}" :data="['nama' => $kategori]" class="p-2 bg-blue-400 text-white rounded-lg">
                                Edit
                            </x-splade-link>
                            <x-splade-form action="{{ route('kategori.destroy', $kategori) }}" method="delete"
                                confirm="Delete kategori" confirm-text="Are you sure you want to delete your kategori?"
                                confirm-button="Yes, delete this kategori!" cancel-button="No, I want to stay!">
                                <x-splade-button class="p-4 bg-red-500 text-white rounded-lg">Delete</x-splade-button>
                            </x-splade-form>
                        </x-splade-cell>
                    </x-splade-table>
                    <x-splade-modal name="modal-edit-kategori" slideover max-width="sm">
                        <x-splade-form action="#">
                            <div class="space-y-4">
                                <div>
                                    <label for="nama_kategori"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="" placeholder="Type product name" required="">
                                </div>
                                <div>
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <textarea id="description" rows="8"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Enter event description here">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                                </div>
                            </div>
                            <div
                                class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                                <x-splade-button type="submit"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    type="button" data-drawer-target="drawer-right-example"
                                    data-drawer-show="drawer-right-example" data-drawer-placement="right"
                                    aria-controls="drawer-right-example">
                                    Save
                                </x-splade-button>
                            </div>

                        </x-splade-form>
                    </x-splade-modal>
                </div>
            </div>
        </div>
        {{-- <x-splade-data store="navigation"  :default="['name' => 'Laravel Splade']" />
            <x-splade-data>
                <input v-model="navigation.name" />
            </x-splade-data> --}}
    </div>
    {{-- pakai cara yaitu menambahkan view  di controller terus kasih modal --}}
</x-app-layout>
