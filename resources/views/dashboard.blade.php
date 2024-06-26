<x-app-layout>
    <x-slot name="headerNav">
        {{ __('Dashboard') }}
    </x-slot>

    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/dashboard">
            Dashboard
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    @can('read client_users')
        <div class="card card-compact w-auto bg-base-100 items-center shadow-xl my-4">
            <h1>Halo Selamat Datang</h1>
        </div>
    @endcan
    @can('read chart')
        <div class="card card-compact w-auto bg-base-100 items-center shadow-xl my-4">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Pesanan</div>
                    <div class="stat-value">{{ $total_kasir }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Users</div>
                    <div class="stat-value">{{ $total_user }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Menu</div>
                    <div class="stat-value">{{ $total_menu }}</div>
                </div>

            </div>
        </div>
        <div class="card card-compact w-auto bg-base-100 items-center shadow-xl my-4">
            <div class="card-title">Total Harga Pesanan Yang Terjual Per Bulan</div>
            <Lingkar-chart :totalPesananPerBulan="@js($totalPesananPerBulan)" :totalBulanIni="@js($totalBulanIni)" />
        </div>
    @endcan
</x-app-layout>
