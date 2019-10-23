<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon.ico">

        <title>CleanSa</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Owl Carousel CSS -->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <!-- Icon CSS -->
        <link href="css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
<script  type="text/javascript" src="js/jquery.js"></script>


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
		<style>
			.prijava{
				display: grid;
				grid-template-columns: 1fr 1fr 1fr;
				grid-gap: 5px;
				margin-bottom: 10px;
			}
			.description {
				grid-column: span 2;
			}
			.trash-img{
				height: 75px;
				width: 75px;
			}
			.count {
				display: flex;
				align-items: center;
			}
			.count p {
				margin: 0px !important;
				font-size: 13px;
    			font-weight: bold;
			}
			body {font-family: Arial, Helvetica, sans-serif;}

			/* Full-width input fields */
			input[type=text], input[type=password] {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}

			/* Set a style for all buttons */
			button {
				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
			}

			button:hover {
				opacity: 0.8;
			}

			/* Extra styles for the cancel button */
			.cancelbtn {
				width: auto;
				padding: 10px 18px;
				background-color: #f44336;
			}

			/* Center the image and position the close button */
			.imgcontainer {
				text-align: center;
				margin: 24px 0 12px 0;
				position: relative;
			}

			img.avatar {
				width: 40%;
				border-radius: 50%;
			}

			.container {
				padding: 16px;
			}

			span.psw {
				float: right;
				padding-top: 16px;
			}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
				padding-top: 60px;
			}

			/* Modal Content/Box */
			.modal-content {
				background-color: #fefefe;
				margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
				border: 1px solid #888;
				width: 80%; /* Could be more or less, depending on screen size */
			}

			/* The Close Button (x) */
			.close {
				position: absolute;
				right: 25px;
				top: 0;
				color: #000;
				font-size: 35px;
				font-weight: bold;
			}

			.close:hover,
			.close:focus {
				color: red;
				cursor: pointer;
			}

			/* Add Zoom Animation */
			.animate {
				-webkit-animation: animatezoom 0.6s;
				animation: animatezoom 0.6s
			}

			@-webkit-keyframes animatezoom {
				from {-webkit-transform: scale(0)} 
				to {-webkit-transform: scale(1)}
			}
				
			@keyframes animatezoom {
				from {transform: scale(0)} 
				to {transform: scale(1)}
			}

			@media screen and (max-width: 300px) {
				span.psw {
				   display: block;
				   float: none;
				}
				.cancelbtn {
				   width: 100%;
				}
			}
			input[type=text], select {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=submit] {
				width: 100%;
				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}

			input[type=submit]:hover {
				background-color: #45a049;
			}

			#div {
				background-color: #f2f2f2;
				padding: 20px;
			}

			.paragraf{
				font-size: 13px;
    			font-weight: bold;
			}
			.logo-div{
				display:flex;
				align-items: center;
			}
			.clean{
				font-size:30px;

				color:#90ee90;
			}
			.sa{
				font-size:30px;
			}
</style>
<script>
function sendNotification (id,status){
	var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //  document.getElementById("demo").innerHTML = this.responseText;
	updateTrashLevel();
    }
  };
  xhttp.open("GET", "sendNotification.php?id="+id+"&status="+status, true);
  xhttp.send();
}
</script>
    </head>


    <body data-spy="scroll" data-target="#navbar-menu">
	<div id="id-modal" class="modal" style="border-radius:20px; position: fixed;     z-index: 9999;">
	<div style="display: flex;"><span style="margin-left: auto; margin-right:20px; cursor: pointer; font-size: 25px;" id="closeModal">X</span></div>
	
	<div style="text-align:center">
	
	<img width="40%" id="photo-image" src="" >
	</div>
			  

	</div>
        <!-- Navbar -->
        <nav class="navbar navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
			<div class="logo-div">
			<img src="images/logo.png" width="40px">
			<a class="navbar-brand cleanSa" href="#"><span class="clean">Clean</span><span class="sa">Sa</span></a>
			</div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Mapa</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="exchange.php">Exchange</a>
                        </li> -->
						<li class="nav-item active">
                            <a class="nav-link" href="report.php">Prijave korisnika</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="stats.php">Statistika</a>
                        </li>
				
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">O nama</a>
                        </li>
                         <!-- <li class="nav-item">
								<button onclick="document.getElementById('id-modal').style.display='block'" style="width:auto;" class="btn btn-custom navbar-btn">Login</button>
                        </li> -->
                    </ul>

                </div>
            </div>
        </nav>


			    <div  class="row">


				<div id="div-prijave" class="col-lg-4" style="overflow: scroll;margin: 2%;margin-top: 0px;overflow-x: auto;height: 500px;">
			  <!-- <form action="/action_page.php">
				<label for="fname">First Name</label>
				<input type="text" id="fname" name="firstname" placeholder="Your name..">

				
				<label for="lname">Description</label>
				<input type="text" id="lname" name="lastname" placeholder="Product description">
				
				<label for="country">Country</label>
				<select id="country" name="country">
				<option value="australia">Bosnia and Herzegoviana</option>
				  <option value="australia">Australia</option>
				  <option value="canada">Canada</option>
				  <option value="usa">USA</option>
				</select>
			  
				<input type="submit" value="Submit">
			  </form> -->
			</div>
		
			<div class="col-lg-6">

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRU4fcRkOZQCcD85ZL8ChsHZIHBNCS2U4&callback=initMap"></script>
<script>

 	var markers;

	var functionLoad = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lon),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var geocoder = geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lon);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
				icon: 
				{
                        url: 'images/reporttrash.png', // url
                        scaledSize: new google.maps.Size(60, 60), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(0, 0), // anchor
                        labelOrigin: new google.maps.Point(22, 50)
                    },
                title: data.opis
                // draggable: true,
                // animation: google.maps.Animation.DROP
				});
            // (function (marker, data) {
            //     google.maps.event.addListener(marker, "click", function (e) {
            //         infoWindow.setContent(data.description);
            //         infoWindow.open(map, marker);
            //     });
            //     google.maps.event.addListener(marker, "dragend", function (e) {
            //         var lat, lng, address;
            //         geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
            //             if (status == google.maps.GeocoderStatus.OK) {
            //                 lat = marker.getPosition().lat();
            //                 lng = marker.getPosition().lng();
            //                 address = results[0].formatted_address;
            //                 console.log("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
			// 					var circle = new google.maps.Circle({
			// 					  map: map,
			// 					  radius: 5,    // 10 miles in metres
			// 					  fillColor: '#AA0000'
								  
			// 					});
			// 					circle.bindTo('center', marker, 'position');
            //             }
            //         });
            //     });
            // })(marker, data);
            latlngbounds.extend(marker.position);

        }
        var bounds = new google.maps.LatLngBounds();
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
	};
	
	function updateTrashLevel() {
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
 			
 			markers = JSON.parse(this.responseText);

 			var htmlResponse = "";
 			markers.forEach(marker => {
 				htmlResponse += "<div class='prijava'><img  class='trash-img' src=" + marker.slika + "></img><button type='button' onclick='sendNotification("+marker.id+",1)' class='btn btn-success'>Dozvoli</button><button type='button' onclick='sendNotification("+marker.id+",2)' class='btn btn-danger'>Odbaci</button><div><p><b>    Datum:<br></b> " + marker.datum + "</p></div><div class='description'><p><b>Opis: </b> " + marker.opis + "</p></div><div class='count'><p>44</p class='paragaf'><img width='20' src='images/star.svg'></div></div>"
 			});
			 document.getElementById("div-prijave").innerHTML = htmlResponse;
			functionLoad();
         }
     };
     xhttp.open("GET", "getPrijave.php", true);
	 xhttp.send();
 }
 	updateTrashLevel();

    window.onload = functionLoad;
	// $('img').on('click',function(){
	// alert("aaaaaaaa");
	// });
	$(document).on('click','img',function(e){
document.getElementById('id-modal').style.display='block';
document.getElementById('photo-image').src=e.target.src;

});
$(document).on('click','#closeModal',function(e){
document.getElementById('id-modal').style.display='none';





});
</script>
<div id="dvMap" style="width: 100%; height: 500px">
</div>
			</div>
           
			</div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>

        <!-- Owl Carousel -->                                                      
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>

        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive:{
                    0:{
                        items:1
                    }
                }
            })
        </script>
	

	   <script>
		var modal = document.getElementById('id-neki-drugi');

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		</script>
    </body>
</html>