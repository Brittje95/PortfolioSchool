const cacheName="CACHE_BRITT1";
const appFiles=[
    "/portfolio/manifest.json",
    "/portfolio/style.css",
    "/portfolio/script.js",
    "/portfolio/img/header.jpg",
    "/portfolio/add.php",
    "/portfolio/add-form.php",
    "/portfolio/connect.php",
    "/portfolio/countdown.html",
    "/portfolio/delete.php",
    "/portfolio/footer.html",
    "/portfolio/header.php",
    "/portfolio/index.php",
    "/portfolio/list.php",
    "/portfolio/sprint",
    "/portfolio/update.php",
    "/portfolio/update-form.php",
    "/portfolio/upload.php",
    "/portfolio/vak.php",
    "/portfolio/img/icons/icon-72x72.png",
    "/portfolio/img/icons/icon-144x144.png"
];

self.addEventListener("install",(installing)=>{
    //Put important offline files in cache on installation of the service worker
    installing.waitUntil(
        caches.open(cacheName).then((cache)=>{
            console.log("Service Worker: Caching important offline files");
            return cache.addAll(appFiles);
        })
    );
    console.log("Service Worker: I am being installed, hello world!");
});

self.addEventListener("activate",(activating)=>{
    console.log("Service Worker: All systems online, ready to go!");
});

self.addEventListener("fetch",(fetching)=>{

    fetching.respondWith(
        caches.match(fetching.request).then((response)=>{
            if (fetching.request.url.includes(".jpg")){
                console.log("JPEG gevraagd");
                return caches.match("/portfolio/img/header.jpg");
            }
            console.log("Service Worker: Fetching resource "+fetching.request.url);
            return response||fetch(fetching.request).then((response)=>{
                console.log("Service Worker: Resource "+fetching.request.url+" not available in cache");
                return caches.open(cacheName).then((cache)=>{
                    console.log("Service Worker: Caching (new) resource "+fetching.request.url);
                    cache.put(fetching.request,response.clone());
                    return response;
                });
            }).catch(function(){
                console.log("Service Worker: Fetching online failed, HAALLPPPP!!!");
            })
        })
    );
    console.log("Service Worker: User threw a ball, I need to fetch it!");
});

self.addEventListener("push",(pushing)=>{
    console.log("Service Worker: I received some push data, but because I am still very simple I don't know what to do with it :(");
});