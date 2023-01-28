<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATBJOsBYgg1LDagwc_JuDQ4yu0ZBIR5LM&callback=initMap&v=weekly"
defer
></script>
<script>
    let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

window.initMap = initMap;
</script>

<div id="map"></div>