<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/users">
            Users
            </Link>
        </x-breadcrumbs-link>
        <x-breadcrumbs-link>
            Edit
        </x-breadcrumbs-link>
    </x-breadcrumbs>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-splade-form class="space-y-4" action="{{ route('users.update', $user) }}" :default="$user"
                    method="put">
                    <x-splade-input name="name" label="Name" />
                    <x-splade-select name="gender" :options="$gender" label="Pilih gender" />
                    <x-splade-input name="email" type="email" placeholder="Your Email Address" label="Email" />
                    <x-splade-input name="password" type="password" placeholder="Your Password" label="Password" />
                    <x-splade-select name="roles[]" :label="__('roles')" :options="$roles" option-value="name" multiple relation choices required />
                    <x-splade-submit label="save" :spinner="false" />
                </x-splade-form>
            </div>
        </div>
    </div>
</x-app-layout>
