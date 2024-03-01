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
    <div class="card card-compact w-auto bg-base-100 items-center shadow-xl my-4">
        <Lingkar-chart />
    </div>
    <div class="card card-compact w-auto bg-base-100 items-center shadow-xl">
        <Line-chart />
    </div>





</x-app-layout>
