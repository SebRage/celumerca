document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([40.416775, -3.703790], 13);
    var marker;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var geocoder = L.Control.geocoder({
        defaultMarkGeocode: false
    })
    .on('markgeocode', function(e) {
        var latlng = e.geocode.center;
        updateMarkerAndForm(latlng);
        map.fitBounds(e.geocode.bbox);
    })
    .addTo(map);

    map.on('click', function(e) {
        updateMarkerAndForm(e.latlng);
    });

    function updateMarkerAndForm(latlng) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(latlng).addTo(map);
        document.getElementById('latitud').value = latlng.lat.toFixed(6);
        document.getElementById('longitud').value = latlng.lng.toFixed(6);
    }

    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = {
            nombre: document.getElementById('nombre').value,
            email: document.getElementById('email').value,
            latitud: document.getElementById('latitud').value,
            longitud: document.getElementById('longitud').value
        };
        console.log('Datos del formulario:', formData);
        // Aquí iría el código para enviar los datos al servidor
        alert('Registro exitoso. Datos capturados: ' + JSON.stringify(formData));
    });
});