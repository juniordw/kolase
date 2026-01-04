# Analytics Setup Guide - KOLASE

Panduan lengkap untuk mengatur Google Analytics, Meta Pixel, Google Tag Manager, dan Google Search Console untuk website KOLASE.

---

## 📊 1. Google Analytics 4 (GA4)

### Cara Mendapatkan Measurement ID:

1. **Buka Google Analytics**
   - Kunjungi: https://analytics.google.com/
   - Login dengan akun Google Anda

2. **Buat Property Baru** (jika belum ada)
   - Klik "Admin" di pojok kiri bawah
   - Di kolom "Property", klik "Create Property"
   - Masukkan nama property: `KOLASE`
   - Pilih timezone: `(GMT+07:00) Jakarta`
   - Pilih currency: `Indonesian Rupiah (IDR)`
   - Klik "Next"

3. **Setup Data Stream**
   - Pilih platform: `Web`
   - Masukkan website URL: `https://kolase.id`
   - Masukkan stream name: `KOLASE Website`
   - Klik "Create stream"

4. **Ambil Measurement ID**
   - Setelah stream dibuat, Anda akan melihat `Measurement ID`
   - Format: `G-XXXXXXXXXX`
   - **Copy ID ini**

5. **Tambahkan ke .env**
   ```env
   GOOGLE_ANALYTICS_MEASUREMENT_ID=G-XXXXXXXXXX
   ```

### Cara Re-aktifkan Analytics di Layout:

Analytics code sudah tersedia di `resources/views/layouts/app.blade.php.backup`.
Copy kode dari file backup ke `app.blade.php` antara baris 33-101.

---

## 📱 2. Meta Pixel (Facebook Pixel)

### Cara Mendapatkan Pixel ID:

1. **Buka Facebook Events Manager**
   - Kunjungi: https://business.facebook.com/events_manager
   - Login dengan akun Facebook Business Anda
   - *Note: Anda perlu Facebook Business Account. Jika belum punya, buat di https://business.facebook.com/*

2. **Buat Pixel Baru** (jika belum ada)
   - Klik tombol hijau "+ Connect Data Sources"
   - Pilih "Web"
   - Pilih "Meta Pixel"
   - Klik "Connect"
   - Masukkan nama pixel: `KOLASE Website Pixel`
   - Masukkan website URL: `https://kolase.id`
   - Klik "Continue"

3. **Ambil Pixel ID**
   - Setelah pixel dibuat, klik nama pixel di sidebar kiri
   - Di halaman overview, lihat **Pixel ID** (biasanya 15-16 digit)
   - Format: `1234567890123456`
   - **Copy ID ini**

4. **Tambahkan ke .env**
   ```env
   META_PIXEL_ID=1234567890123456
   ```

### Testing:
- Install [Meta Pixel Helper](https://chrome.google.com/webstore/detail/meta-pixel-helper/) extension di Chrome
- Buka website Anda dan lihat apakah pixel terdeteksi

---

## 🏷️ 3. Google Tag Manager (GTM)

### Cara Mendapatkan Container ID:

1. **Buka Google Tag Manager**
   - Kunjungi: https://tagmanager.google.com/
   - Login dengan akun Google Anda

2. **Buat Account & Container Baru** (jika belum ada)
   - Klik "Create Account"
   - **Account Setup:**
     - Account Name: `KOLASE`
     - Country: `Indonesia`
   - **Container Setup:**
     - Container name: `KOLASE Website`
     - Target platform: `Web`
   - Klik "Create"
   - Setujui Terms of Service

3. **Ambil Container ID**
   - Setelah container dibuat, Anda akan melihat 2 kode
   - Di bagian atas ada **Container ID**
   - Format: `GTM-XXXXXXX`
   - **Copy ID ini**

4. **Tambahkan ke .env**
   ```env
   GTM_CONTAINER_ID=GTM-XXXXXXX
   ```

### Setup Tags di GTM:

**Untuk Google Analytics:**
1. Di GTM, klik "Tags" > "New"
2. Tag Configuration: Pilih "Google Analytics: GA4 Configuration"
3. Measurement ID: Masukkan GA4 Measurement ID Anda
4. Triggering: Pilih "All Pages"
5. Save & Submit

**Untuk Facebook Pixel:**
1. Klik "Tags" > "New"
2. Tag Configuration: Pilih "Custom HTML"
3. Paste kode Facebook Pixel
4. Triggering: Pilih "All Pages"
5. Save & Submit

---

## 🔍 4. Google Search Console

### Cara Mendapatkan Verification Code:

1. **Buka Google Search Console**
   - Kunjungi: https://search.google.com/search-console
   - Login dengan akun Google Anda

2. **Add Property**
   - Klik "Add property"
   - Pilih "URL prefix"
   - Masukkan: `https://kolase.id`
   - Klik "Continue"

3. **Pilih Verification Method**
   - Pilih method: **"HTML tag"**
   - Anda akan melihat meta tag seperti:
     ```html
     <meta name="google-site-verification" content="xxxxxxxxxxxxxxxxxxxxx" />
     ```

4. **Ambil Verification Code**
   - Copy hanya bagian `content="xxxxxxxxxxxxxxxxxxxxx"`
   - **Jangan** copy seluruh meta tag, hanya value di dalam quotes

5. **Tambahkan ke .env**
   ```env
   GOOGLE_SITE_VERIFICATION=xxxxxxxxxxxxxxxxxxxxx
   ```

6. **Verify**
   - Setelah menambahkan ke .env dan deploy ke production
   - Kembali ke Search Console dan klik "Verify"

---

## ✅ Checklist Setup

Setelah mendapatkan semua ID, update file `.env`:

```env
# Analytics & Tracking
GOOGLE_ANALYTICS_MEASUREMENT_ID=G-XXXXXXXXXX
META_PIXEL_ID=1234567890123456
GTM_CONTAINER_ID=GTM-XXXXXXX
GOOGLE_SITE_VERIFICATION=xxxxxxxxxxxxxxxxxxxxx
```

### Testing di Local:

1. Copy `.env.example` ke `.env`
2. Tambahkan semua analytics ID
3. Re-activate analytics code di `resources/views/layouts/app.blade.php` (copy dari app.blade.php.backup)
4. Clear cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```
5. Buka website di browser dan cek:
   - **Google Analytics**: Lihat Real-time reports di GA4
   - **Meta Pixel**: Install Meta Pixel Helper extension
   - **GTM**: Install Tag Assistant extension
   - **View Page Source**: Pastikan semua script terload

---

## 🚀 Deploy to Production

1. **Update .env di server production**
   ```bash
   nano .env
   # Tambahkan analytics IDs
   ```

2. **Clear cache di production**
   ```bash
   php artisan config:cache
   php artisan view:cache
   ```

3. **Verify setup:**
   - Google Analytics: Check Real-time users
   - Meta Pixel: Test Events in Events Manager
   - GTM: Check Tag firing in Preview mode
   - Search Console: Verify ownership

---

## 📞 Troubleshooting

### Analytics tidak muncul di GA4:
- Pastikan Measurement ID benar (format: G-XXXXXXXXXX)
- Check browser console untuk errors
- Pastikan AdBlocker disabled
- Tunggu 24-48 jam untuk data muncul

### Meta Pixel tidak terdeteksi:
- Pastikan Pixel ID benar (15-16 digits)
- Install Meta Pixel Helper untuk debug
- Check Events Manager > Test Events

### GTM tidak load:
- Pastikan Container ID benar (format: GTM-XXXXXXX)
- Check Page Source, pastikan GTM script ada
- Use GTM Preview mode untuk debug

### Search Console verification gagal:
- Pastikan meta tag ada di `<head>`
- Pastikan GOOGLE_SITE_VERIFICATION value benar
- Clear cache: `php artisan view:clear`
- Check Page Source, pastikan meta tag visible

---

## 📚 Resources

- [Google Analytics 4 Documentation](https://support.google.com/analytics/answer/9304153)
- [Meta Pixel Documentation](https://www.facebook.com/business/help/952192354843755)
- [Google Tag Manager Guide](https://support.google.com/tagmanager/answer/6102821)
- [Search Console Help](https://support.google.com/webmasters/answer/9008080)

---

**Last Updated:** 4 Januari 2026
**Version:** 1.0.0
