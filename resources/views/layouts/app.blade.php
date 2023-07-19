
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Peta Kabupaten Sumenep</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
	   {{-- stayle-mapbox --}}
	   <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

	   @livewireStyles
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        @include('layouts.header')
		<!-- Sidebar -->
		@include('layouts.sidebar')

        @yield('content')
		{{ isset($slot) ? $slot : null }}

		{{-- <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Google Maps</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Maps</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Google Maps</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<a href="https://hpneo.github.io/gmaps/">gmaps.js</a> allows you to use the potential of Google Maps in a simple way. Read <a href="https://hpneo.github.io/gmaps/">Full Documentation</a>.
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Basic Maps</div>
								</div>
								<div class="card-body">
									<div id="map-basic" class="map-demo"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Markers</div>
								</div>
								<div class="card-body">
									<div id="map-markers" class="map-demo"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Poligons</div>
								</div>
								<div class="card-body">
									<div id="map-polygons" class="map-demo"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Static</div>
								</div>
								<div class="card-body">
									<div id="map-static" class="map-demo"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Routes</div>
								</div>
								<div class="card-body">
									<button class="btn btn-default mb-2" id="start_travel">Start</button>
									<div id="map-routes" class="map-demo"></div>
									<ul id="instructions" class="mt-2">
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Geocoding</div>
								</div>
								<div class="card-body">
									<form id="geocoding_form">
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="address" placeholder="address...">
											<div class="input-group-append">
												<button class="btn btn-primary" id="submit" type="submit"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
									<div id="map-geocoding" class="map-demo"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div> --}}
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
				<div class="title">Settings</div>
				<div class="custom-content">
					<div class="switcher">
						<div class="switch-block">
							<h4>Topbar</h4>
							<div class="btnSwitch">
								<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
								<button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
								<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
								<button type="button" class="changeMainHeaderColor" data-color="green"></button>
								<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
								<button type="button" class="changeMainHeaderColor" data-color="red"></button>
							</div>
						</div>
						<div class="switch-block">
							<h4>Background</h4>
							<div class="btnSwitch">
								<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
								<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
								<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							</div>
						</div>
					</div>
				</div>
				<div class="custom-toggle">
					<i class="flaticon-settings"></i>
				</div>
			</div>
		<!-- End Custom template -->
	</div>
	@livewireScripts
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    @stack('scripts')
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Google Maps Plugin -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1On32WMJzaErjXZhvYcEvYDQ_5PvlMCw"
	></script>
	<script src="../../assets/js/plugin/gmaps/gmaps.js"></script>
	<!-- Azzara JS -->
	<script src="../../assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo.js"></script>
	<script>
		$(document).ready(function(){
			var mapBasic = new GMaps({
				div: '#map-basic',
				lat: -12.043333,
				lng: -77.028333
			});

			var mapMarkers = new GMaps({
				div: '#map-markers',
				lat: -12.043333,
				lng: -77.03,
			});

			mapMarkers.addMarker({
				lat: -12.043333,
				lng: -77.03,
				title: 'Lima',
				details: {
					database_id: 42,
					author: 'HPNeo'
				},
				click: function(e){
					if(console.log)
						console.log(e);
					alert('You clicked in this marker');
				}
			});

			var mapPolygons = new GMaps({
				div: '#map-polygons',
				lat: -12.043333,
				lng: -77.028333
			});
			var path = [[-12.040397656836609,-77.03373871559225],
			[-12.040248585302038,-77.03993927003302],
			[-12.050047116528843,-77.02448169303511],
			[-12.044804866577001,-77.02154422636042]];

			polygon = mapPolygons.drawPolygon({
				paths: path,
				strokeColor: '#BBD8E9',
				strokeOpacity: 1,
				strokeWeight: 3,
				fillColor: '#BBD8E9',
				fillOpacity: 0.6
			});

			//map routes
			mapRoutes = new GMaps({
				div: '#map-routes',
				lat: -12.043333,
				lng: -77.028333
			});

			$('#start_travel').click(function(e){
				e.preventDefault();
				mapRoutes.travelRoute({
					origin: [-12.044012922866312, -77.02470665341184],
					destination: [-12.090814532191756, -77.02271108990476],
					travelMode: 'driving',
					step: function(e){
						$('#instructions').append('<li>'+e.instructions+'</li>');
						$('#instructions li:eq('+e.step_number+')').delay(450*e.step_number).fadeIn(200, function(){
							mapRoutes.setCenter(e.end_location.lat(), e.end_location.lng());
							mapRoutes.drawPolyline({
								path: e.path,
								strokeColor: '#131540',
								strokeOpacity: 0.6,
								strokeWeight: 6
							});
						});
					}
				});
			});

			// map static
			var url = GMaps.staticMapURL({
				size: [610, 300],
				lat: -12.043333,
				lng: -77.028333
			});
			$('<img style="width: 100%; height: 100%" />').attr('src', url).appendTo('#map-static');

			// map geocoding
			mapGeocoding = new GMaps({
				div: '#map-geocoding',
				lat: -12.043333,
				lng: -77.028333
			});
			$('#geocoding_form').submit(function(e){
				e.preventDefault();
				GMaps.geocode({
					address: $('#address').val().trim(),
					callback: function(results, status){
						if(status=='OK'){
							var latlng = results[0].geometry.location;
							mapGeocoding.setCenter(latlng.lat(), latlng.lng());
							mapGeocoding.addMarker({
								lat: latlng.lat(),
								lng: latlng.lng()
							});
						}
					}
				});
			});
		})
	</script>
</body>
</html>