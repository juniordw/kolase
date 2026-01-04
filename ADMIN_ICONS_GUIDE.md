# Admin Settings - Logo & Icons Management Guide

## 📱 Fitur yang Sudah Tersedia

### Current Features (Sudah Ada):
1. ✅ Site Logo upload
2. ✅ Favicon upload
3. ✅ Admin Logo upload
4. ✅ Profile Image upload
5. ✅ Contact & Social Media settings

### New Features Added:
1. ✅ PWA Icons Management (favicon_ico, favicon_16, favicon_32)
2. ✅ Apple Touch Icon (apple_touch_icon)
3. ✅ Android Chrome Icons (android_chrome_192, android_chrome_512)
4. ✅ Social Media Images (og_image, twitter_image)
5. ✅ Logo Dark Mode variant (site_logo_dark)
6. ✅ Automatic copy to public folder
7. ✅ Address field

---

## 🎯 Cara Menggunakan

### Access Settings:
1. Login ke Admin Panel (`/admin`)
2. Menu **"Pengaturan"** di sidebar
3. Upload logo/icons sesuai kebutuhan

### Upload Flow:
1. **Upload** file melalui form
2. File tersimpan di `storage/app/public/settings/`
3. **Automatic copy** untuk PWA icons ke folder `public/`
4. Icons langsung available untuk website

---

## 📋 Icons Reference

### Browser Favicons:
| Icon | Size | Nama File | Field Name |
|------|------|-----------|------------|
| Favicon ICO | 16x16, 32x32, 48x48 | `favicon.ico` | `favicon_ico` |
| Favicon PNG 16 | 16x16px | `favicon-16x16.png` | `favicon_16` |
| Favicon PNG 32 | 32x32px | `favicon-32x32.png` | `favicon_32` |

### PWA Icons:
| Icon | Size | Nama File | Field Name | Purpose |
|------|------|-----------|------------|---------|
| Apple Touch | 180x180px | `apple-touch-icon.png` | `apple_touch_icon` | iOS home screen |
| Android 192 | 192x192px | `android-chrome-192x192.png` | `android_chrome_192` | Android home screen |
| Android 512 | 512x512px | `android-chrome-512x512.png` | `android_chrome_512` | Android splash screen |

### Social Media:
| Image | Size | Field Name | Purpose |
|-------|------|------------|---------|
| OG Image | 1200x630px | `og_image` | Facebook, WhatsApp share |
| Twitter Card | 1200x600px | `twitter_image` | Twitter/X share |

### Logos:
| Logo | Field Name | Purpose |
|------|------------|---------|
| Site Logo | `site_logo` | Main website logo |
| Logo Dark | `site_logo_dark` | Dark mode variant |
| Admin Logo | `admin_logo` | Admin panel logo |

---

## 🔧 Technical Implementation

### Controller Method: `copyIconToPublic()`

```php
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
```

**What it does:**
- Auto-copies uploaded icons from `storage/` to `public/`
- Uses standard PWA naming conventions
- Icons immediately available for browser/PWA

---

## 🎨 Icon Generation Tools

### Recommended Tools:

**1. PWA Builder Image Generator** (Best)
- URL: https://www.pwabuilder.com/imageGenerator
- Upload 1 master image (512x512px minimum)
- Generates ALL required sizes
- Download ZIP, extract, upload via admin

**2. Favicon.io**
- URL: https://favicon.io/
- Text/Emoji/Image options
- Quick generation
- Perfect for simple icons

**3. Figma/Photoshop**
- Manual creation
- Full design control
- Export multiple sizes

**4. ImageMagick (CLI)**
```bash
# Resize master icon to all sizes
convert master.png -resize 512x512 android-chrome-512x512.png
convert master.png -resize 192x192 android-chrome-192x192.png
convert master.png -resize 180x180 apple-touch-icon.png
convert master.png -resize 32x32 favicon-32x32.png
convert master.png -resize 16x16 favicon-16x16.png
convert master.png -define icon:auto-resize=16,32,48 favicon.ico
```

---

## ✅ Upload Checklist

### Initial Setup:
- [ ] Upload site_logo (main logo)
- [ ] Upload favicon_ico (browser tab icon)
- [ ] Upload apple_touch_icon (iOS)
- [ ] Upload android_chrome_192 (Android)
- [ ] Upload android_chrome_512 (Android splash)

### Optional (Recommended):
- [ ] Upload site_logo_dark (dark mode)
- [ ] Upload favicon_16 (16x16 PNG)
- [ ] Upload favicon_32 (32x32 PNG)
- [ ] Upload og_image (social sharing)
- [ ] Upload twitter_image (Twitter cards)

### Settings:
- [ ] Update contact_address
- [ ] Verify social media URLs
- [ ] Test all uploaded icons

---

## 🧪 Testing

### After Upload:

**Browser Icon:**
1. Visit website
2. Check tab icon (favicon)
3. Bookmark page, check bookmark icon
4. Hard refresh (Ctrl+Shift+R) if needed

**PWA Icons:**
1. Open website in mobile browser
2. Chrome → Menu → "Add to Home Screen"
3. Check icon on home screen
4. Open app, check splash screen

**Social Sharing:**
1. Share link on WhatsApp/Facebook
2. Check preview image
3. Verify OG image displays correctly

---

## 📁 File Structure

```
public/
├── favicon.ico                    ← Auto-copied
├── favicon-16x16.png             ← Auto-copied
├── favicon-32x32.png             ← Auto-copied
├── apple-touch-icon.png          ← Auto-copied
├── android-chrome-192x192.png    ← Auto-copied
├── android-chrome-512x512.png    ← Auto-copied
└── site.webmanifest              ← References Android icons

storage/app/public/settings/
├── [hash]_favicon_ico.ico        ← Original uploads
├── [hash]_favicon_16.png
├── [hash]_favicon_32.png
├── [hash]_apple_touch_icon.png
├── [hash]_android_chrome_192.png
├── [hash]_android_chrome_512.png
├── [hash]_site_logo.png
├── [hash]_og_image.jpg
└── etc...
```

---

## 🔄 Dynamic Icon Serving

Icons are automatically referenced in:

**Layout (`app.blade.php`):**
```html
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
```

**Manifest (`site.webmanifest`):**
```json
{
  "icons": [
    {
      "src": "/android-chrome-192x192.png",
      "sizes": "192x192",
      "type": "image/png"
    },
    {
      "src": "/android-chrome-512x512.png",
      "sizes": "512x512",
      "type": "image/png"
    }
  ]
}
```

---

## 🚨 Troubleshooting

### Issue: Icon tidak muncul setelah upload

**Solution:**
1. Hard refresh (Ctrl+Shift+R)
2. Clear browser cache
3. Check file di folder `public/` (should exist)
4. Verify file permissions (755 for folders, 644 for files)

### Issue: PWA tidak installable

**Solution:**
1. Verify HTTPS active
2. Check `site.webmanifest` valid
3. Service worker registered
4. All PWA icons uploaded
5. Run Lighthouse audit

### Issue: OG image tidak tampil saat share

**Solution:**
1. Verify OG image uploaded
2. Check image size (recommended 1200x630px)
3. Use Facebook Sharing Debugger: https://developers.facebook.com/tools/debug/
4. Clear social media cache

---

## 📊 Best Practices

### Icon Design:
- ✅ Simple, clear, recognizable
- ✅ High contrast
- ✅ No thin lines (< 2px)
- ✅ 10% safe margin from edges
- ✅ Square canvas (1:1 ratio)
- ✅ Transparent background (PNG)

### File Optimization:
- ✅ Use PNG for icons (better transparency)
- ✅ Optimize with TinyPNG or ImageOptim
- ✅ Target sizes: < 50KB per icon
- ✅ Use WebP for og_image/twitter_image

### Brand Consistency:
- ✅ Use brand colors
- ✅ Consistent style across all icons
- ✅ Match website design language
- ✅ Test on light & dark backgrounds

---

## 🎯 Quick Start Guide

### For First Time Setup:

**Step 1: Prepare Master Icon**
- Create 512x512px PNG
- Brand colors, transparent background
- Save as `master-icon.png`

**Step 2: Generate All Sizes**
- Visit https://www.pwabuilder.com/imageGenerator
- Upload master-icon.png
- Download generated ZIP

**Step 3: Upload via Admin**
- Login to `/admin/settings`
- Upload each icon to matching field
- Click "Simpan Pengaturan"

**Step 4: Verify**
- Check website favicon
- Test PWA install
- Share link, check OG image

**Done!** ✅

---

**Last Updated:** 4 Januari 2026
**Version:** 2.0.0
