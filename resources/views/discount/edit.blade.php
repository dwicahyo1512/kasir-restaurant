<x-splade-modal slideover>

    <x-splade-form class="space-y-4" action="{{ route('discount.update', $discount) }}" :default="[
        'n' => $discount->name,
        't' => $discount->type,
        'v' => $discount->value,
        'min' => $discount->min_purchase_amount,
        'start_d' => $discount->start_date,
        'end_d' => $discount->end_date,
    ]" method="put">
        <x-splade-input name="n" label="Name" />
        <x-splade-select name="t" :options="$selectType" label="Type Discount" relation  choices  />
        <x-splade-select name="t" :options="$selectTypeUsers" label="Type Users Discount" relation  choices  />
        <x-splade-input name="v" label="Value" />
        <x-splade-input name="min" label="minimal harga pembelian"/>
        <x-splade-input name="start_d" date label="Awal Tanggal"/>
        <x-splade-input name="end_d" date label="Akhir Tanggal"/>
        <x-splade-submit label="Update" :spinner="true" />
    </x-splade-form>

</x-splade-modal>
