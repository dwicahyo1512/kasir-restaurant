@seoTitle(__('permissions'))

<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/permissions">
            Permission
            </Link>
        </x-breadcrumbs-link>
        <x-breadcrumbs-link>
            Edit
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
        </div>
    </div>
    {{-- Content --}}
    <x-section-content>
        <x-splade-form :action="route('permissions.update', $permission)" method="PUT" :default="$permission" class="space-y-4">
            <x-splade-input name="name" label="{{ __('name') }}" required />
            <x-splade-select name="roles[]" label="{{ __('roles') }}" :options="$roles" multiple relation choices />
            <x-splade-submit :label="__('submit')" />
        </x-splade-form>
    </x-section-content>
</x-app-layout>
