import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Service Worker Registration for PWA
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then((registration) => {
                console.log('ServiceWorker registered:', registration.scope);

                // Check for updates periodically
                setInterval(() => {
                    registration.update();
                }, 60000); // Check every minute
            })
            .catch((error) => {
                console.log('ServiceWorker registration failed:', error);
            });
    });
}

// Install prompt for PWA
let deferredPrompt;
const installButton = document.getElementById('pwa-install-button');

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent the mini-infobar from appearing on mobile
    e.preventDefault();
    // Stash the event so it can be triggered later
    deferredPrompt = e;

    // Show install button if exists
    if (installButton) {
        installButton.style.display = 'block';

        installButton.addEventListener('click', async () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                console.log(`User response to the install prompt: ${outcome}`);
                deferredPrompt = null;
                installButton.style.display = 'none';
            }
        });
    }
});

// Track PWA install
window.addEventListener('appinstalled', () => {
    console.log('PWA was installed');

    // Track with analytics if available
    if (typeof gtag === 'function') {
        gtag('event', 'pwa_install', {
            'event_category': 'engagement',
            'event_label': 'PWA Installed'
        });
    }
});

// Online/Offline status monitoring
window.addEventListener('online', () => {
    console.log('Back online');
    document.body.classList.remove('offline');
});

window.addEventListener('offline', () => {
    console.log('Connection lost');
    document.body.classList.add('offline');
});
