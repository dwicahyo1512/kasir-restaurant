<x-app-layout>
    <x-slot name="headerNav">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="card card-compact w-96 bg-base-100 shadow-xl px-6">
        <div class="text-sm breadcrumbs">
            <ul>
                <li>
                    <Link href="/">
                    Home
                    </Link>
                </li>
                <li>
                    <Link href="/dashboard">
                    Dashboard
                    </Link>
                </li>
            </ul>
        </div>
    </div>
    <div class="card card-compact w-auto bg-base-100 shadow-xl my-4">
        <Lingkar-chart />
    </div>
    <div class="card card-compact w-auto bg-base-100 shadow-xl">
        <Line-chart />
    </div>





</x-app-layout>
