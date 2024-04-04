$(function () {

	// data
	let latitude = $('#latitude').val();
	let longitude = $('#longitude').val();
	let name = $('#name').val();
	let zoom = 16;

	// icone
	let icon = L.icon({
			iconUrl: '/img/boat/boat.png',
			iconSize:     [38, 50], // size of the icon
			iconAnchor:   [22, 40], // point of the icon which will correspond to marker's location
			popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
	});

	// map view
	let map = L.map('map').setView([latitude, longitude], zoom);

	// attributes base on Use Policy
	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '<a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> | <a href="https://www.openstreetmap.org/fixthemap" target="_blank">FixTheMap</a>'
	}).addTo(map);

	// map bind
	L.marker([latitude, longitude], {icon: icon}).addTo(map)
	.bindPopup(name);

});
