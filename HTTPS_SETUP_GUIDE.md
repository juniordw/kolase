# HTTPS Setup Guide - KOLASE

Panduan lengkap untuk mengaktifkan HTTPS di production server untuk website KOLASE.

---

## 🔒 Mengapa HTTPS Penting?

1. **Security**: Enkripsi data antara server dan browser
2. **SEO**: Google memberi ranking lebih tinggi untuk HTTPS sites
3. **Trust**: Browser menampilkan "Secure" badge
4. **PWA**: Service Workers membutuhkan HTTPS
5. **Modern APIs**: Geolocation, Camera, dll membutuhkan HTTPS

---

## 📋 Prerequisites

Sebelum enable HTTPS, pastikan:

- ✅ Domain sudah pointing ke server (A record configured)
- ✅ Akses ke server (SSH atau cPanel)
- ✅ Port 443 (HTTPS) terbuka di firewall
- ✅ Apache dengan mod_ssl enabled

---

## 🎯 Step 1: Mendapatkan SSL Certificate

### Option A: Let's Encrypt (FREE - Recommended)

**Menggunakan Certbot:**

```bash
# Install Certbot (Ubuntu/Debian)
sudo apt update
sudo apt install certbot python3-certbot-apache

# Atau untuk CentOS/RHEL
sudo yum install certbot python3-certbot-apache

# Generate SSL Certificate
sudo certbot --apache -d kolase.id -d www.kolase.id

# Certbot akan:
# 1. Verify domain ownership
# 2. Generate SSL certificate
# 3. Automatically configure Apache
# 4. Setup auto-renewal

# Test auto-renewal
sudo certbot renew --dry-run
```

**Certificate akan diinstal di:**
- `/etc/letsencrypt/live/kolase.id/fullchain.pem`
- `/etc/letsencrypt/live/kolase.id/privkey.pem`

### Option B: cPanel AutoSSL (Jika menggunakan cPanel)

1. Login ke cPanel
2. Go to "SSL/TLS Status" di section Security
3. Click "Run AutoSSL"
4. Certificate akan otomatis terinstall

### Option C: Commercial SSL (Paid)

Beli dari:
- Namecheap: https://www.namecheap.com/security/ssl-certificates/
- GoDaddy, Comodo, DigiCert, dll

Follow provider instructions untuk install.

---

## 🚀 Step 2: Enable HTTPS Redirect di .htaccess

### File: `public/.htaccess`

**Uncomment baris 9-10:**

```apache
# Force HTTPS (uncomment in production)
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

**Atau gunakan versi yang lebih robust:**

```apache
# Force HTTPS
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Force HTTPS
    RewriteCond %{HTTPS} off
    RewriteCond %{HTTP:X-Forwarded-Proto} !https
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Force www (optional - jika ingin redirect ke www)
    # RewriteCond %{HTTP_HOST} !^www\. [NC]
    # RewriteRule ^(.*)$ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Atau force non-www (recommended)
    RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
    RewriteRule ^(.*)$ https://%1%{REQUEST_URI} [L,R=301]
</IfModule>
```

---

## ⚙️ Step 3: Update Apache Configuration

### Virtual Host untuk HTTPS

**File:** `/etc/apache2/sites-available/kolase.id-ssl.conf` (atau di cPanel)

```apache
<VirtualHost *:443>
    ServerName kolase.id
    ServerAlias www.kolase.id
    DocumentRoot /var/www/kolase.id/public

    # SSL Configuration
    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/kolase.id/cert.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/kolase.id/privkey.pem
    SSLCertificateChainFile /etc/letsencrypt/live/kolase.id/chain.pem

    # Modern SSL Configuration
    SSLProtocol all -SSLv2 -SSLv3 -TLSv1 -TLSv1.1
    SSLCipherSuite HIGH:!aNULL:!MD5:!3DES
    SSLHonorCipherOrder on

    # HSTS (HTTP Strict Transport Security)
    Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"

    # Other security headers (if not set in Laravel middleware)
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-Content-Type-Options "nosniff"

    <Directory /var/www/kolase.id/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/kolase.id-error.log
    CustomLog ${APACHE_LOG_DIR}/kolase.id-access.log combined
</VirtualHost>

# Redirect HTTP to HTTPS
<VirtualHost *:80>
    ServerName kolase.id
    ServerAlias www.kolase.id

    RewriteEngine On
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</VirtualHost>
```

**Enable site dan reload Apache:**

```bash
# Enable SSL module
sudo a2enmod ssl
sudo a2enmod headers
sudo a2enmod rewrite

# Enable site
sudo a2ensite kolase.id-ssl.conf

# Test configuration
sudo apache2ctl configtest

# Reload Apache
sudo systemctl reload apache2
```

---

## 🔧 Step 4: Update Laravel Configuration

### File: `.env`

```env
# Update APP_URL to HTTPS
APP_URL=https://kolase.id

# Make sure these are set
SESSION_SECURE_COOKIE=true
SESSION_DOMAIN=.kolase.id
```

### File: `config/session.php`

Verify these settings:

```php
'secure' => env('SESSION_SECURE_COOKIE', true),
'same_site' => 'lax',
```

### Clear cache:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ✅ Step 5: Verification & Testing

### 1. Test HTTPS Connection

```bash
# Test dengan curl
curl -I https://kolase.id

# Should return:
# HTTP/2 200
# strict-transport-security: max-age=31536000; includeSubDomains; preload
```

### 2. Test HTTP to HTTPS Redirect

```bash
curl -I http://kolase.id

# Should return:
# HTTP/1.1 301 Moved Permanently
# Location: https://kolase.id/
```

### 3. Test SSL Certificate

**Online Tools:**
- https://www.ssllabs.com/ssltest/ - Comprehensive SSL test
  - Target: **A+ rating**
- https://www.whynopadlock.com/ - Check mixed content issues
- https://securityheaders.com/ - Check security headers
  - Target: **A rating**

### 4. Browser Testing

1. Buka https://kolase.id
2. Check padlock icon di address bar
3. Click padlock > "Certificate is valid"
4. Check "Connection is secure"

### 5. Test PWA

1. Chrome DevTools > Application > Manifest
2. Check "Service Worker" registered
3. Test "Add to Home Screen"

### 6. Check Analytics

Pastikan all tracking scripts load via HTTPS:
- Google Analytics
- Meta Pixel
- Google Tag Manager

**Check browser console untuk mixed content warnings!**

---

## 🛡️ Step 6: Security Hardening (Recommended)

### HSTS Preload (Optional but recommended)

1. Verify HSTS header active
2. Submit domain ke HSTS Preload List:
   - https://hstspreload.org/
   - Requirements:
     - ✅ Valid SSL certificate
     - ✅ Redirect HTTP to HTTPS
     - ✅ HSTS header on base domain
     - ✅ max-age ≥ 31536000
     - ✅ includeSubDomains directive
     - ✅ preload directive

### Content Security Policy Enhancement

File `app/Http/Middleware/SecurityHeaders.php` sudah configured, but verify:

```php
// Update to only allow HTTPS resources
"upgrade-insecure-requests", // Add this directive
```

### Cookie Security

Verify all cookies set dengan `Secure` dan `SameSite` flags.

---

## 🔄 Step 7: Monitor & Maintain

### Auto-Renewal (Let's Encrypt)

Certbot sets up auto-renewal by default. Verify:

```bash
# Check renewal timer
sudo systemctl status certbot.timer

# Test renewal (dry run)
sudo certbot renew --dry-run

# Manual renewal if needed
sudo certbot renew
```

### Certificate Expiration Monitoring

Setup monitoring:
- https://certificatemonitor.org/
- https://www.ssl247.com/ssl-monitoring

Set alert 30 days before expiration.

### Regular Security Audits

Monthly:
- Run SSL Labs test
- Check Security Headers
- Review Apache error logs for SSL issues

---

## 🚨 Troubleshooting

### Issue: "Mixed Content" Warning

**Problem:** Page loads via HTTPS tapi ada resources (images, scripts) via HTTP

**Solution:**
1. Check browser console
2. Find HTTP resources
3. Update ke HTTPS atau relative URLs

```bash
# Find hardcoded HTTP URLs
grep -r "http://" resources/views/
grep -r "http://" app/

# Replace dengan relative URLs atau HTTPS
```

### Issue: "NET::ERR_CERT_AUTHORITY_INVALID"

**Problem:** SSL certificate tidak trusted

**Solution:**
- Verify certificate installation
- Check intermediate certificates
- Verify domain name matches certificate

```bash
# Check certificate
sudo certbot certificates

# Reinstall if needed
sudo certbot delete --cert-name kolase.id
sudo certbot --apache -d kolase.id -d www.kolase.id
```

### Issue: Redirect Loop

**Problem:** Infinite redirect antara HTTP dan HTTPS

**Solution:**
1. Check .htaccess rules
2. Check Apache virtual host config
3. Disable CloudFlare SSL (if applicable) atau set to "Full (Strict)"

```apache
# Use this instead in .htaccess
RewriteCond %{HTTPS} off
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### Issue: Performance Degradation

**Problem:** Site slower after HTTPS

**Solution:**
1. Enable HTTP/2 di Apache:
```bash
sudo a2enmod http2
```

Add to virtual host:
```apache
Protocols h2 h2c http/1.1
```

2. Enable OCSP Stapling:
```apache
SSLUseStapling on
SSLStaplingCache "shmcb:logs/ssl_stapling(32768)"
```

---

## 📊 Performance Optimization

### Enable HTTP/2

```apache
<VirtualHost *:443>
    # ... other config ...

    # Enable HTTP/2
    Protocols h2 h2c http/1.1
</VirtualHost>
```

### Enable Session Resumption

```apache
SSLSessionCache shmcb:/var/cache/apache2/ssl_gcache_data(512000)
SSLSessionCacheTimeout 300
```

---

## 📝 Checklist Final

Production HTTPS Checklist:

- [ ] SSL Certificate installed dan valid
- [ ] HTTP automatically redirects ke HTTPS
- [ ] HSTS header active (max-age=31536000)
- [ ] SSL Labs test: **A+ rating**
- [ ] Security Headers test: **A rating**
- [ ] No mixed content warnings
- [ ] PWA works (service worker, installable)
- [ ] All analytics tracking via HTTPS
- [ ] `.env` updated (`APP_URL=https://...`)
- [ ] `SESSION_SECURE_COOKIE=true` in `.env`
- [ ] Cache cleared (`php artisan config:cache`)
- [ ] Auto-renewal configured (Let's Encrypt)
- [ ] Monitoring setup (certificate expiration)
- [ ] Google Search Console updated to HTTPS version
- [ ] Google Analytics property updated

---

## 📚 Resources

- [Let's Encrypt Documentation](https://letsencrypt.org/docs/)
- [Mozilla SSL Configuration Generator](https://ssl-config.mozilla.org/)
- [SSL Best Practices](https://github.com/ssllabs/research/wiki/SSL-and-TLS-Deployment-Best-Practices)
- [Apache SSL/TLS Documentation](https://httpd.apache.org/docs/2.4/ssl/)
- [Laravel HTTPS Configuration](https://laravel.com/docs/11.x/requests#configuring-trusted-proxies)

---

**Last Updated:** 4 Januari 2026
**Version:** 1.0.0
