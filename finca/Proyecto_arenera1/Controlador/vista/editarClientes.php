<?php
session_start();
if (empty($_SESSION['idEmpleados'])){
    header("Location: index.php");

}/*else{
    if($_SESSION['TipoUsuario'] == "Administrador"){
        echo "Hola Administrador";
    }else if ($_SESSION['TipoUsuario'] == "Empleado"){
        echo "Hola Empleado";
    }else if ($_SESSION['TipoUsuario'] == "Cliente"){
        echo "Hola Cliente";
    }
}*/
?><?php require "../Controlador/ClientesController.php"; ?>
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
				
                        <?php if(!empty($_GET['respuesta'])){ ?>
                            <?php if ($_GET['respuesta'] == "correcto"){ ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>La especialidad!</strong> se ha actualizado correctamente.
                                </div>
                            <?php }else {?>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> No se pudo ingresar la especialidad intentalo nuevamente!!
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                            <?php
                            $DataEspecialidad = ClientesController::buscarID($_GET["id"]);

                            ?>
                            <form class="form-horizontal form-label-left" method="post" action="../Controlador/ClientesController.php?action=editar" novalidate>

                                <p>Ingrese toda la informacion relacionada con la <code>Cliente</code>
                                </p>
                                <span class="section">Informacion General</span>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombres <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="idClientes" value="<?php echo $DataEspecialidad->getidClientes(); ?>" name="idClientes" hidden required="required" type="text">
                                        <input id="Nombres" value="<?php echo $DataEspecialidad->getNombres(); ?>" class="form-control col-md-7 col-xs-12" name="Nombres" placeholder="Nombres" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellidos <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="Apellidos" value="<?php echo $DataEspecialidad->getApellidos(); ?>" class="form-control col-md-7 col-xs-12" name="Apellidos" placeholder="Apellidos" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo Documento <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="TipoDoc" value="<?php echo $DataEspecialidad->getTipoDoc(); ?>" class="form-control col-md-7 col-xs-12" name="TipoDoc" placeholder="Tipo Documento" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cedula <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="Cedula" value="<?php echo $DataEspecialidad->getCedula(); ?>" class="form-control col-md-7 col-xs-12" name="Cedula" placeholder="Cedula" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telefono <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="Telefono" value="<?php echo $DataEspecialidad->getTelefono(); ?>" class="form-control col-md-7 col-xs-12" name="Telefono" placeholder="Telefono" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="Contraseña" value="<?php echo $DataEspecialidad->getContraseña(); ?>" class="form-control col-md-7 col-xs-12" name="Contraseña" placeholder="Password" required="required" type="Password">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancelar</button>
                                        <button id="send" type="submit" class="btn btn-success">Enviar</button>
                                    </div>
                                </div>
                            </form>

                        <?php }else{ ?>
                            <?php if (empty($_GET["respuesta"])){ ?>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> No se encontro ninguna especialidad con el parametro de busqueda.
                                </div>
                            <?php } ?>
                        <?php } ?>

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

</html>
