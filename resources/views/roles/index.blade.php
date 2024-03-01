@seoTitle(__('roles'))

<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/roles">
            Roles
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                roles
            </h1>
        </div>
        <div>
            @can('create roles')
                <x-btn-link href="#create">
                    add_new
                </x-btn-link>
            @endcan
        </div>
    </div>
    {{-- Create Modal --}}
    @can('create roles')
        <x-splade-modal name="create">
            <x-splade-form :action="route('roles.store')" method="POST" class="space-y-4">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    add_new
                </h3>
                <x-splade-input name="name" label="{{ __('name') }}" required />
                <x-splade-select name="permissions[]" label="{{ __('permissions') }}" :options="$permissions" multiple relation choices required />
                <x-splade-submit :label="__('submit')" />
            </x-splade-form>
        </x-splade-modal>
    @endcan
    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$roles">
            <x-splade-cell action as="$role">
                {{-- Edit --}}
                @can('update roles')
                    <x-nav-link href="{{ route('roles.edit', $role) }}">
                        edit
                    </x-nav-link>
                @endcan
                {{-- Delete --}}
                @can('delete roles')
                    <x-nav-link href="{{ route('roles.destroy', $role) }}" method="DELETE" confirm="{{ __('confirm_delete_role') }}" confirm-text="{{ __('confirm_text_delete_role') }}" class="text-red-600 dark:text-red-600">
                        delete
                    </x-nav-link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-app-layout>
