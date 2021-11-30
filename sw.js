// Archivo: C:\xampp\htdocs\pwa4\sw.js
var nombreCache = 'cuatro';
self.addEventListener(
	'install', 
	evento => {
		evento.waitUntil( 
			caches.open(nombreCache) 
			.then(	
				cache => { 
					cache.addAll( 
						[ 
							//'./bootstrap-5.0.2-dist/css/bootstrap.min.css',
							//'./img/sw.jpg'//,
							'script.js',
							'offline',
							'estilos.css',
							'icons/icon-72x72.png',
							'icons/icon-96x96.png',
							'icons/icon-128x128.png',
							'icons/icon-144x144.png',
							'icons/icon-152x152.png',
							'icons/icon-192x192.png',
							'icons/icon-384x384.png',
							'icons/icon-512x512.png',
							'infomaP.php',
							'principal.php',
							'gestionDisp.php',
							'historial.php',
							'header.php',
							'footer.php'
						]
					);
				}
			)
		);
	}
);

self.addEventListener(
	'fetch', 
	function(evento) { 
		console.log("Se produjo evento fetch: " + evento.request.url);
		evento.respondWith(
			caches.match(evento.request)
			.then(
				function(respuesta){
					if(respuesta){ 
						console.log("La respuesta se toma de la caché");
						return respuesta; 
					}
					console.log("La respuesta se toma del servidor");
					return fetch(evento.request);
				}
			)
		);
	}
);