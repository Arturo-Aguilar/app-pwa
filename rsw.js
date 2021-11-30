// Archivo: C:\xampp\htdocs\pwa4\rsw.js
if ('serviceWorker' in navigator) {  
	navigator.serviceWorker.register('./sw.js')
	.then(
		function(registro) { 
			console.log('Registro de Service Worker exitoso' + registro.scope);   
		}
	)
	.catch(
		function(error) {  
			console.log('Error en el registro de ServiceWorker: ' + error);
		}
	);
}
