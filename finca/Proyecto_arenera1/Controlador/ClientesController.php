<?php
session_start();
require_once (__DIR__.'/../Modelo/Clientes.php');

if(!empty($_GET['action'])){
    ClientesController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ClientesController{

    static function main($action){
        if ($action == "crear"){
            ClientesController::crear();
        }else if ($action == "editar"){
            ClientesController::editar();
        }else if ($action == "buscarID"){
            ClientesController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            ClientesController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            ClientesController::InactivarEspecialidad();
        }else if($action == "Login"){
            ClientesController::Login();
        }else if($action == "CerrarSession"){
            ClientesController::CerrarSession();
        }
    }


    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombres'] = $_POST['Nombre'];
            $arrayEspecialidad['Apellidos'] = $_POST['Apellido'];
            $arrayEspecialidad['TipoDoc'] = $_POST['Tipo'];
            $arrayEspecialidad['Cedula'] = $_POST['Cedula'];
            $arrayEspecialidad['Telefono'] = $_POST['Telefono'];
            $arrayEspecialidad['Contrasena'] = $_POST['Password'];
            $Especialidad = new Clientes ($arrayEspecialidad);
           //var_dump($arrayEspecialidad);
             $Especialidad->insertar();
            header("Location: ../Vista/createCliente.php?respuesta=correcto");

        } catch (Exception $e) {
            header("Location: ../Vista/createCliente.php?respuesta=error");
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
            $arrayEspecialidad['Nombres'] = $_POST['Nombres'];
            $arrayEspecialidad['Apellidos'] = $_POST['Apellidos'];
            $arrayEspecialidad['TipoDoc'] = $_POST['TipoDoc'];
            $arrayEspecialidad['Cedula'] = $_POST['Cedula'];
            $arrayEspecialidad['Telefono'] = $_POST['Telefono'];
            $arrayEspecialidad['Contraeña'] = $_POST['Contraseña'];
            $arrayEspecialidad['idClientes'] = $_POST['idClientes'];
            $especial = new Clientes($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            if(!$arrayEspecialidad) {
                $especial->editar();
                header("Location: ../Vista/editarClientes.php?respuesta=correcto");
            }else{

            }

        } catch (Exception $e) {
            //header("Location: ../Vista/editarClientes.php?respuesta=error");
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
            return Clientes::buscarForId($id);
        } catch (Exception $e) {
           header("Location: ../gestionarClientes.php?respuesta=error");
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
                $respuesta = Clientes::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['Cedula'] = $respuesta['Cedula'];
                    $_SESSION['Tipo_User'] = "Cliente";
                   // $_SESSION['TipoUsuario'] = $respuesta['Tipo'];
                    $_SESSION['Nombres'] = $respuesta['Nombres'];
                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
           header("Location: ../vista/index.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../vista/index.php");
    }

}

?>