@seoTitle(__('settings'))

<x-app-layout>
    <x-breadcrumbs>
        <x-breadcrumbs-link>
            <Link href="/settings">
            Settings
            </Link>
        </x-breadcrumbs-link>
    </x-breadcrumbs>
    <x-section-content>
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">settings</h1>
        </div>
        <div>
            <x-splade-form :action="route('settings.update')" method="PUT" class="space-y-4"
                :default="
                    [
                        'website_name' => getSetting('website_name'),
                        'website_url' => getSetting('website_url'),
                        'website_email_address' => getSetting('website_email_address'),
                        'user_registration' => getSetting('user_registration'),
                        'new_user_default_role' => getSetting('new_user_default_role'),

                        'timezone' => getSetting('timezone'),

                        {{-- SEO Configuration  --}}
                        'seo_title' => getSetting('seo_title'),
                        'seo_author' => getSetting('seo_author'),
                        'seo_keywords' => getSetting('seo_keywords'),
                        'seo_description' => getSetting('seo_description'),
                        'social_title' => getSetting('social_title'),
                        'social_description' => getSetting('social_description'),
                        'social_image' => social_image(),
                        'light_logo' => light_logo(),
                        'dark_logo' => dark_logo(),
                        'favicon' => favicon(),

                        // SMTP
                        'smtp_host' => getSetting('smtp_host'),
                        'smtp_port' => getSetting('smtp_port'),
                        'smtp_username' => getSetting('smtp_username'),
                        'smtp_password' => getSetting('smtp_password'),
                        'smtp_sender_email' => getSetting('smtp_sender_email'),
                        'smtp_sender_name' => getSetting('smtp_sender_name'),
                        'smtp_encryption' => getSetting('smtp_encryption'),

                        // Custom Code
                        'header_code' => getSetting('header_code'),
                        'footer_code' => getSetting('footer_code'),
                    ]
                ">
                {{-- Website Name --}}
                <x-splade-input v-model="form.website_name" name="website_name" :label="__('website_name')" required />
                {{-- Website URL --}}
                <x-splade-input v-model="form.website_url" type="url" name="website_url" :label="__('website_url')" required />
                {{-- Website Email Address --}}
                <x-splade-input v-model="form.website_email_address" name="website_email_address" :label="__('website_email_address')" required />
                {{-- User Registration --}}
                <x-splade-checkbox v-model="form.user_registration" name="user_registration" value="1" false-value="0"  label="{{ __('user_registration') }}" />
                {{-- New User Default Role --}}
                <x-splade-select v-model="form.new_user_default_role" name="new_user_default_role" :options="$roles" :label="__('new_user_default_role')" choices required />

                {{-- Timezone --}}
                <x-splade-select v-model="form.timezone" name="timezone" :options="timezone_identifiers_list()" :label="__('timezone')" choices />
                {{-- Date format --}}
                <x-splade-select name="date_format" :label="__('date_format')" choices>
                    <option value="F j, Y" {{ getSetting('date_format') == 'F j, Y' ? 'selected' : ''  }}>{{ date("F j, Y") }}</option>
                    <option value="Y-m-d" {{ getSetting('date_format') == 'Y-m-d' ? 'selected' : ''  }}>{{ date("Y-m-d") }}</option>
                    <option value="m/d/Y" {{ getSetting('date_format') == 'm/d/Y' ? 'selected' : ''  }}>{{ date("m/d/Y") }}</option>
                    <option value="d/m/Y" {{ getSetting('date_format') == 'd/m/Y' ? 'selected' : ''  }}>{{ date("d/m/Y") }}</option>
                    <option value="Y/m/d" {{ getSetting('date_format') == 'Y/m/d' ? 'selected' : ''  }}>{{ date("Y/m/d") }}</option>
                </x-splade-select>
                {{-- Update Button --}}

                {{-- SEO Configuration  --}}
                <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">seo_configuration</h2>

                {{-- SEO Title --}}
                <x-splade-input v-model="form.seo_title" name="seo_title" :label="__('seo_title')" />
                {{-- SEO Author --}}
                <x-splade-input v-model="form.seo_author" name="seo_author" :label="__('seo_author')" />
                {{-- SEO Keywords --}}
                <x-splade-input v-model="form.seo_keywords" name="seo_keywords" :label="__('seo_keywords')" />
                {{-- SEO Description --}}
                <x-splade-input v-model="form.seo_description" name="seo_keywords" :label="__('seo_description')" />
                {{-- Social Title --}}
                <x-splade-input v-model="form.social_title" name="social_title" :label="__('social_title')" />
                {{-- Social Description --}}
                <x-splade-input v-model="form.social_description" name="social_description" :label="__('social_description')" />
                {{-- Social Image --}}
                <x-splade-file name="social_image" :label="__('social_image')" filepond preview accept="image/png,jpg,jpeg" max-size="5MB" />

                {{-- Logo & Favicon  --}}
                <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">logo_and_favicon</h2>

                {{-- Light Logo --}}
                <x-splade-file name="light_logo" :label="__('light_logo')" filepond preview accept="image/png,jpg,jpeg" max-size="5MB" />
                {{-- Dark Logo --}}
                <x-splade-file name="dark_logo" :label="__('dark_logo')" filepond preview accept="image/png,jpg,jpeg" max-size="5MB" />
                {{-- Favicon --}}
                <x-splade-file name="favicon" :label="__('favicon')" filepond preview accept="image/png,jpg,jpeg" max-size="5MB" :min-resolution="512 * 512" :max-resolution="512 * 512" />

                {{-- SMTP --}}
                <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">smtp</h2>

                {{-- SMTP Host --}}
                <x-splade-input v-model="form.smtp_host" name="smtp_host" :label="__('smtp_host')" />
                {{-- SMTP Port --}}
                <x-splade-input v-model="form.smtp_port" name="smtp_port" :label="__('smtp_port')" />
                {{-- SMTP Username --}}
                <x-splade-input v-model="form.smtp_username" name="smtp_username" :label="__('smtp_username')" />
                {{-- SMTP Password --}}
                <x-splade-input v-model="form.smtp_password" type="password" name="smtp_password" :label="__('smtp_password')" />
                {{-- SMTP Sender Email --}}
                <x-splade-input v-model="form.smtp_sender_email" name="smtp_sender_email" :label="__('smtp_sender_email')" />
                {{-- SMTP Sender Name --}}
                <x-splade-input v-model="form.smtp_sender_name" name="smtp_sender_name" :label="__('smtp_sender_name')" />
                {{-- SMTP Sender Encryption --}}
                <x-splade-input v-model="form.smtp_encryption" name="smtp_encryption" :label="__('smtp_encryption')" />

                {{-- Custom Code --}}
                <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">custom_code</h2>

                {{-- Header Code --}}
                <x-splade-textarea v-model="form.header_code" name="header_code" :label="__('header_code')" autosize />
                {{-- Footer Code --}}
                <x-splade-textarea v-model="form.footer_code" name="footer_code" :label="__('footer_code')" autosize />

                {{-- Update Button --}}
                <x-splade-submit :label="__('save')" />
            </x-splade-form>
        </div>
    </x-section-content>
</x-app-layout>
