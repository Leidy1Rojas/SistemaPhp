<?php
session_start();
require_once (__DIR__.'/../Modelo/pedidos.php');

if(!empty($_GET['action'])){
    pedidosController::main($_GET['action']);
}else{
    header ("No se encontro ninguna accion...");
}

class PedidosController{

    static function main($action){
        if ($action == "crear"){
            pedidosController::crear();
        }else if ($action == "editar"){
            pedidosController::editar();
        }else if ($action == "buscarID"){
            pedidosController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            pedidosController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            pedidosController::InactivarEspecialidad();
        }else if ($action == "ActivarEspecialida"){
            pedidosController::ActivarEspecialida();
        }else if ($action == "InactivarEspecialida"){
            pedidosController::InactivarEspecialida();
        }else if ($action == "tdContratro"){
            pedidosController::tdContratro();
        }
    }

    static public function crear (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Cantidad'] = $_POST['Cantidad'];
            $arrayEspecialidad['Fecha'] = $_POST['Fecha'];
            if(isset($_SESSION["Tipo_User"]) && $_SESSION["Tipo_User"] != "Administrador"  ) {
                $arrayEspecialidad['Nombre'] = $_SESSION['Nombres'];
                $arrayEspecialidad['Documento'] = $_SESSION['Cedula'];
            }else{
                $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
                $arrayEspecialidad['Documento'] = $_POST['Documento'];
            }
            $arrayEspecialidad['Ciudad'] = $_POST['Ciudad'];
            $arrayEspecialidad['Direccion'] = $_POST['Direccion'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $Especialidad = new Pedidos ($arrayEspecialidad);
            //var_dump($arrayEspecialidad);

            $Especialidad->insertar();
            header("Location: ../Vista/createPedidos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createPedidos.php?respuesta=error");
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

    static public function tdContratro($idTransporte){

        $arrPerson = Transporte::buscarForId($idTransporte);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .="<td>".$arrPerson->getidTransporte()."Tipo de proceso: ".$arrPerson->getTipoCarro()."</td>";

        return $htmlInput;

    }



    static public function editar (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Cantidad'] = $_POST['Cantidad'];
            $arrayEspecialidad['Fecha'] = $_POST['Fecha'];
            if(isset($_SESSION["Tipo_User"]) && $_SESSION["Tipo_User"] != "Administrador"  ) {
                $arrayEspecialidad['Nombre'] = $_SESSION['Nombres'];
                $arrayEspecialidad['Documento'] = $_SESSION['Cedula'];
                $arrayEspecialidad['Estado'] = "Inactivo";
                $arrayEspecialidad['Confirmacion'] = "Inactivo";
                $arrayEspecialidad['idTransporte'] = "3";
            }else{
                $arrayEspecialidad['Nombre'] = $_SESSION['Nombres'];
                $arrayEspecialidad['Documento'] = $_SESSION['Cedula'];
                $arrayEspecialidad['Estado'] = $_POST['Estado'];
                $arrayEspecialidad['Confirmacion'] = $_POST['Confirmacion'];
                $arrayEspecialidad['idTransporte'] = $_POST['idTransporte'];
            }
            $arrayEspecialidad['Ciudad'] = $_POST['Ciudad'];
            $arrayEspecialidad['Direccion'] = $_POST['Direccion'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $arrayEspecialidad['idPedidos'] = $_POST['idPedidos'];
            $especial = new Pedidos($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            $especial->editar();
           header("Location: ../Vista/editarPedidos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarPedidos.php?respuesta=error");
        }
    }

    static public function ActivarEspecialidad (){
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaA=error");
        }
    }

    static public function InactivarEspecialidad (){
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaD=error");
        }
    }
    static public function ActivarEspecialida (){
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setConfirmacion("Confirmado");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaA=error");
        }
    }

    static public function InactivarEspecialida (){
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setConfirmacion("No Confirmado");
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

}

?>