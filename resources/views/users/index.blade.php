<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/users">
            Users
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <div class="max-w-screen-xl p-6 bg-base border border-base-300 rounded-lg shadow">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-5">
                    <Link href="{{ route('users.create') }}" class="p-4 bg-success text-white rounded-lg"> Create
                    User
                    </Link>
                </div>
                <x-splade-table :for="$users">
                    <x-splade-cell actions as="$user" class="">
                        <x-splade-link href="{{ route('users.edit', $user) }}"
                            class="p-2 bg-info text-white rounded-lg">Edit</x-splade-link>
                        <x-splade-form action="{{ route('users.destroy', $user) }}" method="delete"
                            confirm="Delete User" confirm-text="Are you sure you want to delete your User?"
                            confirm-button="Yes, delete this User!" cancel-button="No, I want to stay!">
                            <x-splade-button class="p-4 bg-error text-white rounded-lg">Delete</x-splade-button>
                        </x-splade-form>
                    </x-splade-cell>
                </x-splade-table>
            </div>
        </div>
    </div>
</x-app-layout>
