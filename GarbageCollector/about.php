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



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
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

    </head>

<body data-spy="scroll" data-target="#navbar-menu">
	
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
							<li class="nav-item">
                            <a class="nav-link" href="report.php">Prijave korisnika</a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link" href="stats.php">Statistika</a>
                        </li>
                         <li class="nav-item active">
                            <a class="nav-link" href="about.php">O nama</a>
                        </li> 
                         <!-- <li class="nav-item">
								<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-custom navbar-btn">Login</button>
                        </li>  -->
                    </ul>

                </div>
            </div>
        </nav>
        <div style="margin-left:50px;">
            <h1>
                Hackaton Za čisto Sarajevo 
            </h1>
			<h4>Problem neadekvatnog odlaganja otpada je prvenstveno uzrokovano nedostatkom kolektivne svijesti i edukacije. Također, prenatrpanost kontejnera uzrokuje odlaganje otpada na nepredviđena mjesta što dodatno otežava već nedovoljno održiv sistem prikupljanja otpada.
			Naš tim - CleanSa je došao do sljedećeg rješenja koje će dovesti do efikasnog načina prikupljanja otpada i aktivnog učešća građana u istom. Sistem se sastoji od modifikovanog smart kontejnera, aplikacije za komunalno preduzeće i građane (proizvođače otpada).
			</h4>
        </div>

</body>

</html>