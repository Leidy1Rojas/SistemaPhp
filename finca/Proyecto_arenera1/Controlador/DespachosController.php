<?php
session_start();
require_once (__DIR__.'/../Modelo/Despacho.php');

if(!empty($_GET['action'])){
    DespachosController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class DespachosController{

    static function main($action){
        if ($action == "crear"){
            DespachosController::crear();
        }else if ($action == "editar"){
            DespachosController::editar();
        }else if ($action == "buscarID"){
            DespachosController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            DespachosController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            DespachosController::InactivarEspecialidad();
        }else if($action == "Login"){
            DespachosController::Login();
        }else if($action == "CerrarSession"){
            DespachosController::CerrarSession();
        }
    }


    static public function crear (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['idTransporte'] = $_POST['idTransporte'];
            $arrayEspecialidad['idPedidos'] = $_POST['idPedidos'];
            $arrayEspecialidad['idClientes'] = $_POST['idClientes'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $Especialidad = new Despacho ($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createDespacho.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createDespacho.php?respuesta=error");
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
            $especial->editar();
            header("Location: ../Vista/editarClientes.php?respuesta=correcto");
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
                    $_SESSION['idClientes'] = $respuesta['idClientes'];
                   // $_SESSION['TipoUsuario'] = $respuesta['Tipo'];
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