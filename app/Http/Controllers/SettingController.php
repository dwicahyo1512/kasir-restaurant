<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update settings',   ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $settings = Setting::get();
        $roles = Role::select('name')->pluck('name')->toArray();

        return view('settings.index', compact('settings', 'roles'));
    }

    public function update(Request $request)
    {
        $settings = $request->all();

        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                if (!in_array($key, ['light_logo', 'dark_logo', 'favicon', 'social_image']))
                    Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        HandleSpladeFileUploads::forRequest($request);

        // Social Image
        if($request->file('social_image')){
            // Delete Current Image
            if (File::exists(public_path(social_image()))) {
                File::delete(public_path(social_image()));
            }

            $social_image = Setting::where('key','social_image')->first();
            $social_image_path = $request->file('social_image')->store('public/images');
            $image_path = str_replace('public/', '', $social_image_path);
            $social_image->update(['value' => $image_path]);
        }

        // Light Logo
        if($request->file('light_logo')){
            // Delete Current Image
            if (File::exists(public_path(light_logo()))) {
                File::delete(public_path(light_logo()));
            }

            $light_logo = Setting::where('key','light_logo')->first();
            $light_logo_path = $request->file('light_logo')->store('public/images');
            $image_path = str_replace('public/', '', $light_logo_path);
            $light_logo->update(['value' => $image_path]);
        }

        // Dark Logo
        if($request->file('dark_logo')){
            // Delete Current Image
            if (File::exists(public_path(dark_logo()))) {
                File::delete(public_path(dark_logo()));
            }

            $dark_logo = Setting::where('key','dark_logo')->first();
            $dark_logo_path = $request->file('dark_logo')->store('public/images');
            $image_path = str_replace('public/', '', $dark_logo_path);
            $dark_logo->update(['value' => $image_path]);
        }

        // Favicon
        if($request->file('favicon')){
            // Delete Current Image
            if (File::exists(public_path(favicon()))) {
                File::delete(public_path(favicon()));
            }

            $favicon = Setting::where('key','favicon')->first();
            $favicon_path = $request->file('favicon')->store('public/images');
            $image_path = str_replace('public/', '', $favicon_path);
            $favicon->update(['value' => $image_path]);
        }

        Toast::title(__('settings_updated'))->autoDismiss(3);
        return redirect()->back();
    }
}
