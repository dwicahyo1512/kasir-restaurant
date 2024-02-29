
<x-splade-modal>
    <x-splade-form class="space-y-4" action="{{ route('kasir.store') }}">
        <input v-model="form.name" placeholder="Name" />
        <x-splade-input name="this.totalPayment" label=" Pesan" />
        <x-splade-input name="name" label="Harga" />
        <x-splade-textarea name="keterangan_menu" autosize label="keterangan" />
        <x-splade-checkbox name="status" value="1" false-value="0" label="Status" />
        <x-splade-submit label="Update" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
