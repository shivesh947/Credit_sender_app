self.addEventListener('install', function(event) {
  console.log('[Service Worker] Installing ');
  event.waitUntil(caches.open('static')
  .then(function(cache){
    cache.addAll([
    '/',
    '/index.php',
    '/index.js',
    '/main.css',
    '/sw.js',
    '/addcredit.php',
    '/addme.php',
    '/icon.png',
    '/manifest.json'
      ]);
  })
  );
});

self.addEventListener('activate', function(event) {
  console.log('[Service Worker] Activating');
  return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
  console.log('[Service Worker] Fetching');
  event.respondWith(
  caches.match(event.request)
    .then(function(res){
       if(res)
       {
        return res;
       }
       else
       {
        return fetch(event.request);
       }
    })
    );
});