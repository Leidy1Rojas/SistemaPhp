<?php
session_start();
if (!empty($_SESSION['idEmpleados'])){
    header("Location: createPedidos.php");
    // if ($_SESSION['TipoUsuario'] != "Administrador"){
    //   header("Location: error.php");
    //}
}
?>
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
				<?php require("snippers/MenuSuperior.php");?>
			</nav>
			<!--Contenido-->
			<div class="content">
				<form id="frmLoginn" name="frmLoginn" class="form-horizontal form-label-left" method="post" action="../Controlador/EmpleadosController.php?action=Login">

            <p style="color: white">Ingrese toda la informacion relacionada con la <code>session Administrador</code>
            </p>
            <span class="section"> </span>

            <div class="item form-group">
                <label style="color: white" class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Documento <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="User" name="User" class="form-control col-md-7 col-xs-12" placeholder="Documento" required="required" type="text">
                </div>
            </div>
            <div class="item form-group">
                <label style="color: white" class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Password" name="Password" class="form-control col-md-7 col-xs-12" placeholder="Password" required="required" type="Password">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <input type="reset" class="btn btn-primary"></input>
                    <input id="btnEnviar" name="btnEnviar" type="submit" class="btn btn-success"></input>
                </div>
            </div>
        </form>

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
	<script>

    $("#frmLoginn").submit(function(e) {
        //alert("Hola Mundo Otro");
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
</html>
