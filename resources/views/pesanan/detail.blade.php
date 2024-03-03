<x-app-layout>
    <div class="card card-compact bg-base-100 shadow-xl">
        <div class="card-body h-[800px]">
            <h2 class="card-title">Struk Pesanan</h2>
            <iframe
                src="/struk/pesanan/{{$pesanan->id}}"
                style="width: 100%; height: 100%"
            ></iframe>
        </div>
    </div>
</x-app-layout>
