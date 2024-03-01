@seoTitle(__('permissions'))

<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/permissions">
            Permission
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4">
        <div>

            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                permissions
            </h1>
        </div>
        <div>
            @can('create permissions')
                <x-btn-link href="#create">
                    add_new
                </x-btn-link>
            @endcan
        </div>
    </div>
    {{-- Create Modal --}}
    @can('create permissions')
        <x-splade-modal name="create">
            <x-splade-form :action="route('permissions.store')" method="POST" class="space-y-4">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    add_new
                </h3>
                <x-splade-input name="name" label="{{ __('name') }}" required />
                <x-splade-select name="roles[]" label="{{ __('mainroles') }}" :options="$roles" multiple relation choices />
                <x-splade-submit :label="__('submit')" />
            </x-splade-form>
        </x-splade-modal>
    @endcan
    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$permissions">
            <x-splade-cell action as="$permission">
                {{-- Edit --}}
                @can('update permissions')
                    <x-nav-link href="{{ route('permissions.edit', $permission) }}">
                        edit
                    </x-nav-link>
                @endcan
                {{-- Delete --}}
                @can('delete permissions')
                    <x-nav-link href="{{ route('permissions.destroy', $permission) }}" method="DELETE" confirm="{{ __('confirm_delete_permission') }}" confirm-text="{{ __('confirm_text_delete_permission') }}" class="text-red-600 dark:text-red-600">
                        delete
                    </x-nav-link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-app-layout>
