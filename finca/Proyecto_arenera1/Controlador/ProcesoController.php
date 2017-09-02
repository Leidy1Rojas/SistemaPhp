<?php

require_once (__DIR__.'/../Modelo/Proceso.php');

if(!empty($_GET['action'])){
    ProcesoController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ProcesoController{

    static function main($action){
        if ($action == "crear"){
            ProcesoController::crear();
        }else if ($action == "editar"){
            ProcesoController::editar();
        }else if ($action == "buscarID"){
            ProcesoController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            ProcesoController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            ProcesoController::InactivarEspecialidad();
        }
    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Tipo'] = $_POST['Tipo'];
            $arrayEspecialidad['Placa'] = $_POST['Seleccion'];
            $arrayEspecialidad['idArena'] = $_POST['Arena'];
            $Especialidad = new Proceso ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createProceso.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createProceso.php?respuesta=error");
        }
}
    
  /*  static public function selectEspecialista ($isRequired=true, $id="idPedidos", $nombre="idPeidos", $class=""){
        $arrEspecialistas = Pedidos::getAll(); 
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrEspecialistas) > 0){
            foreach ($arrEspecialistas as $especialista)
                $htmlSelect .= "<option value='".$especialista->getIdPedidos()."'>".$especialista->getCantidad()." ".$especialista->getProceso()." ".$especialista->getCliente()."</option>";
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
            $arrayEspecialidad['idProceso'] = $_POST['idProceso'];
            $especial = new Proceso($arrayEspecialidad);
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

}

?>