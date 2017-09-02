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
?><?php require ("../Modelo/Transporte.php") ?>
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
				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>tipo</th>
                  <th>Placa</th>
                    <th>Conductor</th>
                    <th>Dueño</th>
                    <th>Empleado</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <?php
                                        $arrEspecialidades = Transporte::getAll();
                                        foreach ($arrEspecialidades as $especialidad){
                                    ?>
                                        <tr>
                                            <td><?php echo $especialidad->getTipoCarro(); ?></td>
                                            <td><?php echo $especialidad->getPLaca(); ?></td>
                                            <td><?php echo $especialidad->getConductor(); ?></td>
                                            <td><?php echo $especialidad->getDueño(); ?></td>
                                            <td><?php echo $especialidad->getidEmpleados(); ?></td>
                                            <td>
 <a href="Editarpedidos.php?id=<?php echo $especialidad->getidTransporte(); ?>
" type="button" data-toggle="tooltip" title="Actualizar" class="btn docs-tooltip btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 
                                            </td>
                                        </tr>
                                    <?php } ?>
                
              </table>
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
