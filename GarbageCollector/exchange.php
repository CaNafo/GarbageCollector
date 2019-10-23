<!DOCTYPE html>
<html lang="en">
    <head>
	    <script src="javascript/desc.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Grabage Collector</title>

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



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->


		<script>
           
		function description()
{
	

	var sub = document.getElementById('desc').value;
	markers[0].description=sub;
	
}
		</script>
		<style>
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
</style>

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">
	<div id="id01" class="modal" style="border-radius:20px; position: fixed;     z-index: 999;">
			  
			  <form class="modal-content animate" action="action_page.php" style="width:30%; border-radius:20px; " >
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				  <img src="avatar1.jpg" alt="Avatar" class="avatar">
				</div>

				<div class="container">
				  <label for="uname"><b>Username</b></label>
				  <input type="text" placeholder="Enter Username" name="uname" required>

				  <label for="psw"><b>Password</b></label>
				  <input type="password" placeholder="Enter Password" name="psw" required>
					
				  <button type="submit">Login</button>
				  <label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				  </label>
				</div>

				<div class="container" style="background-color:#f1f1f1">
				  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				  <span class="psw">Forgot <a href="#">password?</a></span>
				</div>
			  </form>
			</div>
        <!-- Navbar -->
        <nav class="navbar navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="#">Smart Collector</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Map</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="exchange.php">Exchange</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="report.php">Report</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="stats.php">Statistics</a>
                        </li>
						
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">About</a>
                        </li>
                         <li class="nav-item">
								<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-custom navbar-btn">Login</button>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <form action="action_page.php" method="get">
			    <div id="div" class="row">

				<div class="col-lg-4" style="margin-left:110px;">
				<label for="fname">Product Name</label>
				<input type="text" id="fproduct" name="product" placeholder="Product name..">
				                
                <label for="desc">Phone number</label>
                <input type="text" id="phone" name="phone" placeholder="Phone number">
                <input type="text" id="latForma" name="lat" hidden>
                <input type="text" id="lonForma" name="lng" hidden>
				

				<input type="Submit" value="Submit" onclick="description();" >
            </div>
        </form>
		
			<div class="col-lg-6">

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRU4fcRkOZQCcD85ZL8ChsHZIHBNCS2U4&callback=initMap"></script>
<script type="text/javascript">

    var markers = [
        {
            "title": 'Bosmal',
            "lat": '43.846923325980505',
            "lng": '18.37421778158',
            "description": ''
        }/*,
        {
             "title": 'Alibaug',
            "lat": '43.846815',
            "lng": '18.374313',
            "description": ''
        },
        {
           "title": 'Alibaug',
            "lat": '43.846815',
            "lng": '18.374313',
            "description": ''
        },
        {
             "title": 'Alibaug',
            "lat": '43.846815',
            "lng": '18.374313',
            "description": ''
        },
        {
             "title": 'Alibaug',
            "lat": '43.846815',
            "lng": '18.374313',
            "description": ''
        },
        {
             "title": 'Alibaug',
            "lat": '43.846815',
            "lng": '18.374313',
            "description": ''
        }*/
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var geocoder = geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
				icon: 
				{
                        url: 'images/exchange.png', // url
                        scaledSize: new google.maps.Size(40, 40), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(0, 0), // anchor
                        labelOrigin: new google.maps.Point(22, 50)
                    },
                draggable: true,
                animation: google.maps.Animation.DROP
				});
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            
                            address = results[0].formatted_address;
                            alert("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
								var circle = new google.maps.Circle({
								  map: map,
								  radius: 75,    // 10 miles in metres
								  fillColor: '#AA0000'
								  
								});
                                circle.bindTo('center', marker, 'position');
                                //************************************************************************************** */
                                function posaljiUFormu(lat, lon)
                                    {
                                        
                                        var latUformi = document.getElementById("latForma");
                                        var lonUFormi = document.getElementById("lonForma");
                                        latUformi.value = lat;
                                        lonUFormi.value = lon;
                                        alert("AAA");
                                        
                                    }
                                    
                            posaljiUFormu(lat, lng);
                        }
                    });
                    
                });
            })(marker, data);
            latlngbounds.extend(marker.position);
        }
        var bounds = new google.maps.LatLngBounds();
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
    }

    
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
		var modal = document.getElementById('id01');

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
        }
        
       
		</script>
		
		
    </body>
</html>