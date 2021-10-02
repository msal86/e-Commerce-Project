
<?php
	include 'include/db.php';
	
	if(isset($_POST['submit'])){
		$full_name=mysqlil_real_escape_string($_POST['full_name']);
		$email=mysqlil_real_escape_string($_POST['email']);
		$msg=mysqlil_real_escape_string($_POST['msg']);
		
		$query=mysqlil_query($conn, "INSERT INTO `contact` SET full_name='$full_name', email='$email', msg='$msg', timestamp=NOW() ") or die(mysqlil_error());
		
		if($query == 0){
			header('refresh:1; location:contact.php?msg=fail');
		}elseif($query == 1){
			header('location: contact.php?msg=ok');
		}
	}
?>

<?php include "include/header.php"; ?>

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<ul class="nav nav-pills nav-justified" style="border:3px solid #dc3545;">
						<li class="nav-item  office"><a class="nav-link active" style=" border-radius:0;" href="#headoffice" data-toggle="pill">Head Office</a></li>
						<li class="nav-item  office"><a class="nav-link" style=" border-radius:0;" href="#factory" data-toggle="pill">Factory</a></li>
					</ul>
				</div>
			</div></br>
			<div class="tab-content">
				<div id="headoffice" class="container tab-pane active">
					<div class="row">
						<div class="col-md-4">
						<center><i class="fa fa-map-marker fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Location</h3>
						<p class="text-center">LYTCHE SHOPPING, AIRPORT ROAD, LAHORE PAKISTAN</p>
						</div>
						<div class="col-md-4">
						<center><i class="fa fa-phone fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Phone Number</h3>
						<p class="text-center">+924235695276</br> +924235695289</p>
						</div>
						<div class="col-md-4">
						<center><i class="fa fa-envelope fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Email</h3>
						<p class="text-center">lytcheshopping@lytche.com</p>
						</div>
					</div>
				</div>
				<div id="factory" class="container tab-pane fade">
					<div class="row">
						<div class="col-md-4">
						<center><i class="fa fa-map-marker fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Location</h3>
						<p class="text-center">LYTCHE SHOOPING, OPPOSITE PASRUR SUGAR MILLS, SIALKOT ROAD, PASRUR.</p>
						</div>
						<div class="col-md-4">
						<center><i class="fa fa-phone fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Phone Number</h3>
						<p class="text-center">+924235695276</p>
						</div>
						<div class="col-md-4">
						<center><i class="fa fa-envelope fa-2x border" style="padding:5%; padding-left:5%; padding-right:5%;" id="fa-address"></i></center>
						<h3 class="text-center text-danger">Email</h3>
						<p class="text-center">lytcheshopping@lytche.com</p>
						</div>
					</div>
				</div>
			</div>
		</div></br>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				<h1 class="text-center text-danger">Contact With Us</h1></br>
				<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'fail'){

							header("refresh:1 ; url=index.php");
						?>
					<center>
					<h2 class="alert alert-danger">PLZ try Again!</h2>
					</center>
					<?php } if($msg == 'ok'){
						
						 header("refresh:1 ; url=contact.php");
					?>
					<center>
					<h3 class="alert alert-success">Thank You For Your Message!</h3>
					</center>
					<?php } ?>
					<form class="form-horizontal" method="POST">
						<div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" name="full_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="email">Message</label>
							<textarea rows="5" name="msg" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-danger" name="submit">Submit</button>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<div id="map"></div>
					<script>
					  // Note: This example requires that you consent to location sharing when
					  // prompted by your browser. If you see the error "The Geolocation service
					  // failed.", it means you probably did not give permission for the browser to
					  // locate you.
					  var map, infoWindow;
					  function initMap() {
						map = new google.maps.Map(document.getElementById('map'), {
						  center: {lat: -34.397, lng: 150.644},
						  zoom: 6
						});
						infoWindow = new google.maps.InfoWindow;

						// Try HTML5 geolocation.
						if (navigator.geolocation) {
						  navigator.geolocation.getCurrentPosition(function(position) {
							var pos = {
							  lat: position.coords.latitude,
							  lng: position.coords.longitude
							};

							infoWindow.setPosition(pos);
							infoWindow.setContent('Location found.');
							infoWindow.open(map);
							map.setCenter(pos);
						  }, function() {
							handleLocationError(true, infoWindow, map.getCenter());
						  });
						} else {
						  // Browser doesn't support Geolocation
						  handleLocationError(false, infoWindow, map.getCenter());
						}
					  }

					  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
						infoWindow.setPosition(pos);
						infoWindow.setContent(browserHasGeolocation ?
											  'Error: The Geolocation service failed.' :
											  'Error: Your browser doesn\'t support geolocation.');
						infoWindow.open(map);
					  }
					</script>
					<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFOoSrkli71mpgklXs2PQeBA9iqUDWRRA&callback=initMap">
					</script>
				</div>
			</div>
		</div></br>
		
		<?php include "include/footer.php"; ?>