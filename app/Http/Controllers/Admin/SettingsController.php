<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_whatsapp' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',

            // Logos & Icons
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'site_logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'admin_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            // Favicons
            'favicon_ico' => 'nullable|mimes:ico,png|max:512',
            'favicon_16' => 'nullable|image|mimes:png|max:256',
            'favicon_32' => 'nullable|image|mimes:png|max:256',

            // PWA Icons
            'apple_touch_icon' => 'nullable|image|mimes:png|max:1024',
            'android_chrome_192' => 'nullable|image|mimes:png|max:1024',
            'android_chrome_512' => 'nullable|image|mimes:png|max:2048',

            // Social Images
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            // Other
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Handle text settings
        $textSettings = [
            'site_name', 'site_tagline', 'contact_email',
            'contact_phone', 'contact_whatsapp', 'contact_address',
            'social_facebook', 'social_instagram', 'social_twitter'
        ];

        foreach ($textSettings as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key), 'text');
            }
        }

        // Handle image uploads
        $imageSettings = [
            'site_logo', 'site_logo_dark', 'admin_logo',
            'favicon_ico', 'favicon_16', 'favicon_32',
            'apple_touch_icon', 'android_chrome_192', 'android_chrome_512',
            'og_image', 'twitter_image',
            'profile_image'
        ];

        foreach ($imageSettings as $key) {
            if ($request->hasFile($key)) {
                // Delete old image if exists
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    Storage::disk('public')->delete($oldSetting->value);
                }

                // Store new image
                $path = $request->file($key)->store('settings', 'public');
                Setting::set($key, $path, 'image');

                // Copy to public folder for favicons and PWA icons
                if (in_array($key, ['favicon_ico', 'favicon_16', 'favicon_32', 'apple_touch_icon', 'android_chrome_192', 'android_chrome_512'])) {
                    $this->copyIconToPublic($key, $path);
                }
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil diperbarui!');
    }

    /**
     * Copy icon to public folder with standard naming
     */
    private function copyIconToPublic($key, $path)
    {
        $publicPath = storage_path('app/public/' . $path);

        if (!file_exists($publicPath)) {
            return;
        }

        $mapping = [
            'favicon_ico' => public_path('favicon.ico'),
            'favicon_16' => public_path('favicon-16x16.png'),
            'favicon_32' => public_path('favicon-32x32.png'),
            'apple_touch_icon' => public_path('apple-touch-icon.png'),
            'android_chrome_192' => public_path('android-chrome-192x192.png'),
            'android_chrome_512' => public_path('android-chrome-512x512.png'),
        ];

        if (isset($mapping[$key])) {
            copy($publicPath, $mapping[$key]);
        }
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'key' => 'required|string'
        ]);

        $setting = Setting::where('key', $request->key)->first();

        if ($setting && $setting->value) {
            // Delete file from storage
            Storage::disk('public')->delete($setting->value);

            // Update setting to null
            $setting->value = null;
            $setting->save();

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil dihapus'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gambar tidak ditemukan'
        ], 404);
    }
}
