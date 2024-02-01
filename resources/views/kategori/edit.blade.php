
<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Kategori') }}
            </h2>
        </x-slot>
        <div class="p-4 h-full sm:ml-64">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <x-splade-form class="space-y-4" action="{{ route('kategori.update', $kategori) }}" :default="$kategori"
                                method="put">
                                <x-splade-input name="nama_kategori" label="Name" />
                                <x-splade-textarea name="keterangan_kategori" autosize label="keterangan"/>
                                <x-splade-submit label="save" :spinner="false" />
                            </x-splade-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
