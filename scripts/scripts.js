//Dark mode
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

// Whenever the user explicitly chooses light mode
localStorage.theme = 'light'

// Whenever the user explicitly chooses dark mode
localStorage.theme = 'dark'

// Whenever the user explicitly chooses to respect the OS preference
localStorage.removeItem('theme')




if (document.getElementById("map") != null) {
  mapboxgl.accessToken = 'pk.eyJ1Ijoidm9sa2Fua2FsYW1hIiwiYSI6ImNsZnNzYWZkNTA5Yncza21oazI3ZmZlYmcifQ.tGhy_hGoszmb--YrQWR01g';
  const map = new mapboxgl.Map({
    container: 'map', // container ID
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/streets-v12', // style URL
    center: [36.7823795, -1.2825568], // starting position [lng, lat]
    zoom: 15,
    cooperativeGestures: true
  });
  map.addControl(new mapboxgl.FullscreenControl());
  
  // Create a default Marker and add it to the map.
  const rhapta = new mapboxgl.Marker()
    .setLngLat([36.7896269, -1.2647976])
    .addTo(map);

  // Create a default Marker, colored black, rotated 45 degrees.
  const kilimani = new mapboxgl.Marker({ color: 'black' })
    .setLngLat([36.7823795, -1.2825568])
    .addTo(map);

  if (document.getElementById("rider") != null) {

    // Add geolocate control to the map.
    map.addControl(
      new mapboxgl.GeolocateControl({
        positionOptions: {
          enableHighAccuracy: true
        },
        // When active the map will receive updates to the device's location as it changes.
        trackUserLocation: true,
        // Draw an arrow next to the location dot to indicate which direction the device is heading.
        showUserHeading: true
      })
    );
  }
}