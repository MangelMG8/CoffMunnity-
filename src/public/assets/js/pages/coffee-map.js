document.addEventListener('DOMContentLoaded', () => {
  // 1. Coordenadas de Elche (Centro)
  const elcheLocation = [38.2618, -0.6994];

  const map = L.map('map').setView(elcheLocation, 15);

  L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors © <a href="https://carto.com/attributions">CARTO</a>'
  }).addTo(map);

  // 2. Definir un Icono Personalizado
  // Puedes usar una URL de internet o una ruta local como '/assets/img/coffee-pin.png'
  const coffeeIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/924/924514.png',
    iconSize: [38, 38], // Tamaño del icono
    iconAnchor: [19, 38], // Punto del icono que corresponde a la coordenada (la punta)
    popupAnchor: [0, -35]  // Punto desde donde se abre el popup relativo al anchor
  });

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const userLat = position.coords.latitude;
        const userLng = position.coords.longitude;
        map.setView([userLat, userLng], 15);
        L.marker([userLat, userLng]).addTo(map).bindPopup('<b>Estás aquí</b>');
        searchNearbyCafes(userLat, userLng, map, coffeeIcon);
      },
      () => {
        searchNearbyCafes(elcheLocation[0], elcheLocation[1], map, coffeeIcon);
      }
    );
  } else {
    searchNearbyCafes(elcheLocation[0], elcheLocation[1], map, coffeeIcon);
  }
});

function searchNearbyCafes(lat, lng, map, customIcon) {
  const overpassQuery = `[out:json][timeout:25];node["amenity"="cafe"](around:2000,${lat},${lng});out;`;

  const url = `https://overpass-api.de/api/interpreter?data=${encodeURIComponent(overpassQuery)}`;

  fetch(url)
    .then(async response => {
      if (!response.ok) {
        throw new Error(`Error ${response.status}: El servidor de mapas está saturado.`);
      }
      
      const contentType = response.headers.get("content-type");
      if (contentType && contentType.includes("xml")) {
        throw new Error("Overpass API devolvió un XML. Límite de peticiones alcanzado.");
      }

      return response.json();
    })
    .then(data => {
      if (!data || !data.elements) return;

      data.elements.forEach(element => {
        const tags = element.tags;
        if (!tags) return;

        const cafeName = tags.name || 'Cafetería';

        const popupContent = `
          <div class="cafe-info-window" style="text-align: center;">
            <h3 style="margin: 0; font-size: 1.1rem; color: #2C1810;">${cafeName}</h3>
            <p style="margin: 5px 0 0 0; font-size: 0.85rem; color: #6B3A2A;">Click para más info</p>
          </div>
        `;

        const marker = L.marker([element.lat, element.lon], { icon: customIcon })
          .addTo(map)
          .bindPopup(popupContent);

        marker.on('click', () => {
          function formatHorario(osmHours) {
              if (!osmHours) return 'No especificado';
              return osmHours
                  .replace(/Mo/g, 'Lun').replace(/Tu/g, 'Mar').replace(/We/g, 'Mié')
                  .replace(/Th/g, 'Jue').replace(/Fr/g, 'Vie').replace(/Sa/g, 'Sáb')
                  .replace(/Su/g, 'Dom').replace(/-/g, ' a ').replace(/,/g, ' y ')
                  .replace(/;/g, '<br>'); 
          }

          const cafeInfo = {
            id_osm: element.id,
            nombre: tags.name || 'Cafetería sin nombre',
            calle: tags['addr:street'] || 'Dirección no registrada',
            foto: tags.image || null,
            horario: formatHorario(tags.opening_hours),
            telefono: tags.phone || tags['contact:phone'] || null,
            web: tags.website || tags['contact:website'] || null,
            
            // Datos extra
            wifi: tags.wifi === 'yes' || tags.wifi === 'free' ? 'Gratis' : (tags.wifi === 'no' ? 'No' : null),
            sillaRuedas: tags.wheelchair === 'yes' ? 'Accesible' : (tags.wheelchair === 'no' ? 'No accesible' : null),
            terraza: tags.outdoor_seating === 'yes' ? 'Sí' : null,
            tarjetas: (tags['payment:credit_cards'] === 'yes' || tags['payment:debit_cards'] === 'yes') ? 'Sí' : null,
            cocina: tags.cuisine === 'churro' ? 'Churrería' : (tags.cuisine || null)
          };

          showCafeModal(cafeInfo);
        });
      });
    })
    .catch(error => {
      console.error('Error al cargar las cafeterías:', error);
      if (typeof showGenericModal === "function") {
         showGenericModal(
           "Servidor Ocupado", 
           "El servidor gratuito de mapas está recibiendo demasiadas peticiones en este momento. Por favor, espera un minuto y recarga la página."
         );
      }
    });
}