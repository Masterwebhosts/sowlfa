const CACHE_NAME = 'sowlfa-static-v2';

const STATIC_ASSETS = [
    '/manifest.webmanifest',
    '/icons/icon-192.png',
    '/icons/icon-512.png',
    '/icons/icon-mask.png',
    '/offline.html',
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(async (cache) => {
            const results = await Promise.allSettled(
                STATIC_ASSETS.map(async (asset) => {
                    const response = await fetch(asset);

                    if (!response.ok) {
                        throw new Error(
                            `HTTP ${response.status} while fetching ${asset}`
                        );
                    }

                    await cache.put(asset, response);
                })
            );

            results.forEach((result, index) => {
                if (result.status === 'rejected') {
                    console.warn(
                        'SOWLFA: failed to cache:',
                        STATIC_ASSETS[index],
                        result.reason
                    );
                }
            });
        })
    );

    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames
                    .filter((cacheName) => cacheName !== CACHE_NAME)
                    .map((cacheName) => caches.delete(cacheName))
            );
        })
    );

    self.clients.claim();
});

self.addEventListener('fetch', (event) => {
    const url = new URL(event.request.url);

    if (
        event.request.method !== 'GET' ||
        url.origin !== self.location.origin
    ) {
        return;
    }

    if (STATIC_ASSETS.includes(url.pathname)) {
        event.respondWith(
            caches.match(event.request).then((cachedResponse) => {
                return cachedResponse || fetch(event.request);
            })
        );

        return;
    }

    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request).catch(() => {
                return caches.match('/offline.html');
            })
        );
    }
});