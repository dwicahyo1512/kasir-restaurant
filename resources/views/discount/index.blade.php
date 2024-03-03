<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/discount">
            Discount
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <div class="max-w-screen-xl p-6 bg-base border border-base-300 rounded-lg shadow">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="#refund-info" class="p-4 bg-accent text-white rounded-lg">
                Create
                </Link>
                <x-splade-modal name="refund-info" class="space-x-3">
                    <x-splade-form action="{{ route('discount.store') }}">
                        <div class="max-w-lg mx-auto space-y-4">
                            <label for="name" class="italic text-red-400">*Percentage adalah diskon dalam bentuk persen*</label><br/>
                            <label for="name" class="italic text-red-400">*Fixed adalah diskon dalam bentuk Fixed yaitu semua barang akan dikurangi diskon*</label>
                            <x-splade-input name="name" placeholder="Nama Discount" />
                            <x-splade-select name="type" :options="$selectType" placeholder="Select Menu" choices />
                            <x-splade-input name="value" placeholder="jumlah diskon yang diberikan" />
                            <x-splade-input name="min_purchase_amount" placeholder="Harga minimum pembelian" />
                            <x-splade-input name="daterange" placeholder="Batas Waktu pembelian" date range />
                            <x-splade-submit label="save" :spinner="true" />
                        </div>
                    </x-splade-form>
                </x-splade-modal>
                <x-splade-table :for="$discount" class="py-5">
                    <x-slot:empty-state>
                        <p class="text-center">no data!</p>
                    </x-slot>
                    <x-splade-cell Diskon as="$discount">
                        <td>
                            @if ($discount->type === 'percentage')
                            {{ sprintf("%.0f", $discount->value) }}%

                            @else
                                Rp{{ number_format($discount->value, 0, ',', '.') }}
                            @endif
                        </td>
                    </x-splade-cell>
                    <x-splade-cell Minimal as="$discount">
                        <td>
                            @if ($discount->min_purchase_amount)
                                Rp{{ number_format($discount->min_purchase_amount, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                    </x-splade-cell>
                    <x-splade-cell actions as="$discount" class="">
                        <Link slideover href="/discount/{{ $discount->id }}/edit"
                            class="p-2 bg-info text-white rounded-lg">
                        Edit
                        </Link>
                        <x-splade-form action="{{ route('discount.destroy', $discount) }}" method="delete"
                            confirm="Delete discount" confirm-text="Are you sure you want to delete your discount?"
                            confirm-button="Yes, delete this discount!" cancel-button="No, I want to stay!">
                            <x-splade-button class="p-4 bg-error text-white rounded-lg">Delete</x-splade-button>
                        </x-splade-form>
                    </x-splade-cell>
                </x-splade-table>
            </div>
        </div>
    </div>
</x-app-layout>
