<?php
  $pageTitle  = 'Mapa de Cafeterías ☕ | CoffMunnity';
  $activePage = 'map'; 
  $extraCss   = '/assets/css/coffee-map.css'; 

  require_once '../app/includes/header.php'; 
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<div class="map-view-container">
  <div class="map-header">
    <h1>Encuentra tu café ideal</h1>
    <p>Explora las cafeterías que se encuentran por tu zona</p>
  </div>
  
  <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script src="/assets/js/pages/coffee-map.js"></script>

<?php
  require_once '../app/includes/footer.php';
?>