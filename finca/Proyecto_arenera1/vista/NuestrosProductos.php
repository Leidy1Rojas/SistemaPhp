
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Arenera</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" src="dist/img/package/lesshat">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

    <style type="text/css">
        @import "dist/img/package/lesshat.less";

<!--
        .container{
            width: 200px;
            height: 200px;
            <!--position: absolute;-->

            right: 60px;
            margin: 0 auto;
            top:20px;
        }

                .div-img {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;

                .img {
                    display:block;
                    margin-left:auto;
                    margin-right:auto;
                    width:200px;
                    height:200px;
                    border-radius:150px;
                    -webkit-border-radius:150px;
                    -moz-border-radius:150px;
                    transform:translate(0px);
                    -ms-transform:translate(0px);
                 -moz-transform:translate(0px);
                 -webkit-transform:translate(0px);
                 -o-transform: translate(0px);
                 -webkit-transition:all 500ms ease-in-out;
                 -moz-transition:all 500ms ease-in-out;
                 -ms-transition:all 500ms ease-in-out;
                 -o-transition:all 500ms ease-in-out;

                }

        .text {
            font-family: 'Open Sans';
            position: absolute;
            z-index: -1;
            display: block;
            height: 50%;
            top: 50%;
            right: 0;
            padding-right: 5px;
        }

        &:hover {

        .img {
           transform: translate(-90px, 0px);
            -ms-transform: translate(-90px, 0px);
          -moz-transform: translate(-90px,0px);
          -webkit-transform: translate(-90px,0px);
          -o-transform: translate(-90px,0px);

        }

        }

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php require("snippers/MenuSuperiorS.html");?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php require("snippers/Menuizquierdo.php");?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('dist/img/fondo3.jpg');">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      
    </section>

    <!-- Main content -->
    <section class="content">

        

      <form class="form-horizontal form-label-left" method="post" action="../Controlador/ArenaController.php?action=crear" novalidate>

                      <p> <code></code>
                      </p>
                      <span class="section"></span>
          <div class="item form-group" >
              <center>
                  <p class="po">Estos productos son los clasificados por la empresa; sin embargo se<br> cuenta con la capacidad de seleccionar
                      la granulometría requerida por <br>los clientes, buscando su satisfacción óptima. </p>




              <!--    <html >
                  <head>
                      <meta charset="UTF-8">
                      <title>Article News Card</title>
                      <script src="//use.typekit.net/xyl8bgh.js"></script>
                      <script>try{Typekit.load();}catch(e){}</script>
                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

                      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
                      <link rel='stylesheet prefetch' href='css/__codepen_io_andytran_pen.css'>

                      <link rel="stylesheet" href="css/style.css">


                  </head>

                  <body>

                  <div class="container">
                      <div class="info">
                          <h1>Article News Card</h1><span>Made with <i class='fa fa-heart animated infinite pulse'></i> by <a href='http://andy.design'>Andy Tran</a> | Designed by <a href='http://justinkwak.com'>JustinKwak</a></span>
                      </div>
                      <!-- Normal Demo
                      <div class="column">
                          <div class="demo-title">Normal</div>
                          <!-- Post
                          <div class="post-module">
                              <!-- Thumbnail
                              <div class="thumbnail">
                                  <div class="date">
                                      <div class="day">27</div>
                                      <div class="month">Mar</div>
                                  </div><img src="dist/img/are1.PNG"/>
                              </div>
                              <!-- Post Content--
                              <div class="post-content">
                                  <div class="category">Photos</div>
                                  <h1 class="title">City Lights in New York</h1>
                                  <h2 class="sub_title">The city that never sleeps.</h2>
                                  <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
                                  <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> 6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 39 comments</a></span></div>
                              </div>
                          </div>
                      </div>
                      <!-- Hover Demo--
                      <div class="column">
                          <div class="demo-title">Hover</div>
                          <!-- Post--
                          <div class="post-module hover">
                              <!-- Thumbnail--
                              <div class="thumbnail">
                                  <div class="date">
                                      <div class="day">27</div>
                                      <div class="month">Mar</div>
                                  </div><img src="dist/img/are1.PNG"/>
                              </div>
                              <!-- Post Content--
                              <div class="post-content">
                                  <div class="category">Photos</div>
                                  <h1 class="title">City Lights in New York</h1>
                                  <h2 class="sub_title">The city that never sleeps.</h2>
                                  <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
                                  <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-o"></i> 6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 39 comments</a></span></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                  <script src="js/index.js"></script>

                  </body>
                  </html>-->



                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;






             <TABLE  >
                 <TR>
                     <TD WIDTH="100"><img src="dist/img/are1.PNG" class="img-circle" alt="User Image" >

                     </TD>
                     <TD WIDTH="100"><img src="dist/img/are2.PNG" class="img-circle" alt="User Image" >

                     </TD>
                     <TD WIDTH="100"><img src="dist/img/are3.PNG" class="img-circle" alt="User Image">

                     </TD>
                 </TR>
                 <TR>
                     <TD WIDTH="100"> <p class="po"> 0-2, 1”- ½- </p>
                     </TD>
                     <TD WIDTH="100"><p class="po"> 2-4,  ½-¼ </p>
                     </TD>
                     <TD WIDTH="100"><p class="po"> 4-8,  ¼- 1/8 </p>
                     </TD>
                 </TR>
             </TABLE>
<BR>
                  <BR>
                  <TABLE >
                      <TR>
                          <TD WIDTH="100"><img src="dist/img/are4.PNG" class="img-circle" alt="User Image">
                          </TD>
                          <TD WIDTH="100"><img src="dist/img/are5.PNG" class="img-circle" alt="User Image">

                          </TD>
                          <TD WIDTH="100"><img src="dist/img/are6.PNG" class="img-circle" alt="User Image">

                          </TD>
                      </TR>
                      <TR>
                          <TD WIDTH="100"> <p class="po"> 8-12,  1.5mm </p>
                          </TD>
                          <TD WIDTH="100"><p class="po"> 12-20,  0.75mm </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </TD>
                          <TD WIDTH="100"><p class="po"> 30-40, 0.40mm </p>
                          </TD>
                      </TR>
                  </TABLE>


                  <BR>
                  <BR>
                  <BR>
                  <BR>
<p class="pe">FICHA TECNICA DEL PRODUCTO </p>

<TABLE BORDER="1" WIDTH="800" HEIGHT="300">
    <TR>
        <TD WIDTH="100">
            <p class="po">EMPRESA:</p> <P>CLASIFICADORA DE ARENAS  INDUSTRIALES “PEÑA BLANCA”</p>
        </TD>
        <TD WIDTH="100">
            <p class="po">PRODUCTO:</p><P> ARENA SILICE INDSUTRIAL PARA SANDBLASTING</p>
        </TD>
    </TR>
    <TR>
        <TD WIDTH="100" >
            <p class="po">CARACTERISTICAS</p>
        </TD>
        <TD WIDTH="100">
           <p class="po">UNIDAD DE PRODUCTO</p>
        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
           <p class="po">Medida: </p> <P>sacos de polietileno de 50 Kgs</p>
        </TD>
        <TD WIDTH="100">
          <p class="po">Insumos Principales:</p>
            <P>  •         Arena de cantera


              Unidad de medida: kilogramos</p>

        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
           <p class="po">Elemento diferenciador:</p> <P> La diferencia notable es la calidad  granulométrica del producto,
               con un 98.5% de SIO2.</p>
        </TD>
        <TD WIDTH="100">
           <p class="po">Especificaciones Físico-quimicas:</p> <p> masa desagregada, que consta normalmente de
               cuarzo (sílice).
               Dureza: 7(Escala Mohs)
               PH: 6.4
               Humedad: 0.3%
               Gravedad Especifica: 2.65
               Disolución en HCL: 1.1% (24 horas)</p>

        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
           <p class="po"> Cantidad:</p> <P> la requerida por el cliente</p>
        </TD>
        <TD WIDTH="100">
          <p class="po">Comunicación:</p> <P> Para la prestación del servicio se puede  comunicar de forma directa,
              a fin de conocer y establecer buenas relaciones con los clientes.</p>
        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
           <p class="po">Presentación:</p> <P> lavada, secada y clasificada.</p>
        </TD>
        <TD WIDTH="100">
           <p class="po">Tiempo de garantía:</p> <P> calidad garantizada, hasta el momento de su uso.</p>
        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
          <p class="po">Usos o Función:</p> <P> insumo indispensable para  plantas de Fundición, tratamiento de agua,
              Sandblasting, pegantes cerámicos, esculturas, fabricación de vidrio, silicatos, etc.</p>
        </TD>
        <TD WIDTH="100">
           <p class="po">Entrega:</p> <P> El producto se entregará en la empresa y el cliente asume su costo de transporte,
               o se adicionara dicho costo.</p>
        </TD>
    </TR>
    <TR>
        <TD WIDTH="100">
         <p class="po"> Diseño: </p> <P>se presenta de acuerdo al tamiz en o medida requerida por los diferentes clientes desde
             la malla 0 hasta la 200.
             (huecos por pulgada)</p>
        </TD>
        <TD WIDTH="100">
           <p class="po">Guía de Uso:</p> <P> no requiere guía de uso</p>
        </TD>
    </TR>
</TABLE>
              </center>

              <style>
                  p{

                      font-size: 14pt;
                  }
                  .po {
                      font-family: fantasy;
                      font-size: 14pt;
                      color: ;
                  }
                  .pe {
                      font-family: fantasy;
                      font-size: 18pt;
                  }
TABLE{
    border-color: black;
    border-collapse: separate;
}


              </style>

          </div>
          <div class="item form-group">

          </div>

      </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

