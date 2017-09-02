

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
	<?php require("snippers/Menuizquierdo.php");?>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
		<section class="content">
        <div class="item form-group" >
          <div class="col-md-4  wow fadeInRight animated">
              <img src="../assets/img/niñom.png"  alt="User Image">
          </div>
          <div class="col-md-4  wow fadeInRight animated">
          <p>Somos una empresa líder en el mercado  de explotación,clasificación y
              comercialización de arenas sílice, contamos con una
              trayectorita de más de 30 años trabajando en pro a la satisfacción a nuestro clientes
              ofresiendoles una arena de óptima calidad</p>
          </div>
         </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="item form-group">
              <div class="col-md-4  wow fadeInRight animated">
                 <p>Nos proyectaos a 5 años liderar las ventas de arena sílice <br>
                     a nivel nacional apoyándonos en nuestras reservas mineras <br>
                     las cuales cuentan con todos los permiso de explotacion y medio ambiente</p>
              </div>
              <div class="col-md-4  wow fadeInRight animated">
                  <img src="../assets/img/VIS2.png"  alt="User Image">
              </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br>
        <div class="item form-group" >
    <div class="col-md-4  wow fadeInRight animated">
        <img src="../assets/img/Qs.png"  alt="User Image">
    </div>
    <div class="col-md-4  wow fadeInRight animated">
                     <P> Clasificadora de Arenas peña blanca, <br>
                         es una empresa con treinta años de experiencia en el mercado, <br>
                      comprometida con sus clientes, suministrando arena sílice de óptima calidad <br>
                         en sus diferentes granulometrías.
                     </P>
    </div>
        </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="item form-group" >
    <div class="col-md-4  wow fadeInRight animated">
                     <P> Esta empresa garantiza cumplimiento a cualquier escala, <br>
                         debido a que cuenta con su mina de propiedad la cual <br>
                      tiene todos sus permisos de ley como son: licencia de explotación y de medio ambiente.
                     </P>
    </div>
    <div class="col-md-4  wow fadeInRight animated">
        <img src="../assets/img/cc.png"  alt="User Image">
    </div>
        </div>
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


            <br><br><br><br><br>
        <div class="item form-group" >

        </div>


        <style>
           p{

                font-size: 14pt;
            }
            .po {
                font-family: fantasy;
                font-size: 14pt;
            }
            .pe {
                font-family: fantasy;
                font-size: 18pt;
            }
        </style>

      <!-- /.row (main row) -->
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="#">
									Company
								</a>
							</li>
							<li>
								<a href="#">
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
								   Blog
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
					</p>
				</div>
			</footer>
		</div>
	</div>
<script>

    $("#frmLoginn").submit(function(e) {
       // alert("Hola Mundo Otro");
        e.preventDefault();
        var User = $("#User").val();
        var Password = $("#Password").val();

        $.ajax({
            method: "POST",
            url: "../Controlador/EmpleadosController.php?action=Login",
            data: { User: User, Password: Password}
        })

        .done(function( msg ) {
            if(msg == 1){
                window.location.href = "createPedidos.php";
            }else{
                $("#resultado").html(msg);
            }
        });
    });
</script>
</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
