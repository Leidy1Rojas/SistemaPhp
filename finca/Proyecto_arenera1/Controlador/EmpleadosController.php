<?php
session_start();
require_once (__DIR__.'/../Modelo/Empleados.php');

if(!empty($_GET['action'])){
    EmpleadosController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class EmpleadosController{

    static function main($action){
        if ($action == "crear"){
            EmpleadosController::crear();
        }else if ($action == "editar"){
            EmpleadosController::editar();
        }else if ($action == "buscarID"){
            EmpleadosController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            EmpleadosController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            EmpleadosController::InactivarEspecialidad();
        }else if($action == "Login"){
            EmpleadosController::Login();
        }else if($action == "CerrarSession"){
            EmpleadosController::CerrarSession();
        }
    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombres'] = $_POST['Nombres'];
            $arrayEspecialidad['Apellidos'] = $_POST['Apellidos'];
            $arrayEspecialidad['Cedula'] = $_POST['Cedula'];
            $arrayEspecialidad['Telefono'] = $_POST['Telefono'];
            $arrayEspecialidad['Direccion'] = $_POST['Direccion'];
            $arrayEspecialidad['Cargo'] = $_POST['Cargo'];
            $arrayEspecialidad['Contrasena'] = $_POST['Contrasena'];
            $arrayEspecialidad['idHorario'] = $_POST['horario'];
            $arrayEspecialidad['idSalario'] = $_POST['salario'];

            $Especialidad = new Empleados ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createEmpleados.php?respuesta=correcto");
        } catch (Exception $e) {
            //header("Location: ../Vista/createEmpleados.php?respuesta=error");
        }
}
    
  /*  static public function selectEspecialista ($isRequired=true, $id="idPedidos", $nombre="idPeidos", $class=""){
        $arrEspecialistas = Pedidos::getAll(); 
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrEspecialistas) > 0){
            foreach ($arrEspecialistas as $especialista)
                $htmlSelect .= "<option value='".$especialista->getIdPedidos()."'>".$especialista->getCantidad()." ".$especialista->getTransporte()." ".$especialista->getCliente()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }*/


    static public function editar (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Apellido'] = $_POST['Apellido'];
            $arrayEspecialidad['Tipo'] = $_POST['Tipo'];
            $arrayEspecialidad['Cedula'] = $_POST['Cedula'];
            $arrayEspecialidad['Telefono'] = $_POST['Telefono'];
            $arrayEspecialidad['Password'] = $_POST['Password'];
            $arrayEspecialidad['idEmpleados'] = $_POST['idEmpleados'];
            $especial = new Empleados($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/Editarpedidos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Editarpedidos.php?respuesta=error");
        }
    }

    static public function ActivarEspecialidad (){
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['IdPedidos']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaA=error");
        }
    }

    static public function InactivarEspecialidad (){
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaD=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Pedidos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuestaA=error");
        }
    }

    public function buscarAll (){
        try {
            return Pedidos::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }
    public function Login (){
        try {
            $User = $_POST['User'];
            $Password = $_POST['Password'];
            if(!empty($User) && !empty($Password)){
                $respuesta = Empleados::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['Cedula'] = $respuesta['Cedula'];
                    $_SESSION['Tipo_User'] = $respuesta["Cargo"];
                    $_SESSION['Nombres'] = $respuesta['Nombres'];

                    echo TRUE;
                }else if($respuesta == "Password Incorrectow"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";

                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='row'>";
                    echo "<div class='alert alert-success'>";
                    echo "<button class='close' data-dismiss='alert'><span>&times;</span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos!!</p>";
                    echo"</button>";
                    echo " </div>";
                    echo"</div>";
                }

            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            var_dump($e);
            header("Location: ../vista/indexA.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../vista/indexA.php");
    }


}

?>