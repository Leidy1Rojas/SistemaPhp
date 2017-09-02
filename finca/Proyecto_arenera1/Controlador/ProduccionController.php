<?php

require_once (__DIR__.'/../Modelo/Produccion.php');

if(!empty($_GET['action'])){
    ProduccionController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ProduccionController{

    static function main($action){
        if ($action == "crear"){
            ProduccionController::crear();
        }else if ($action == "editar"){
            ProduccionController::editar();
        }else if ($action == "buscarID"){
            ProduccionController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            ProduccionController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            ProduccionController::InactivarEspecialidad();
        }
    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Cantidad'] = $_POST['Cantidad'];
            $arrayEspecialidad['Fecha'] = $_POST['Fecha'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
             $Especialidad = new Produccion ($arrayEspecialidad);
            //var_dump($arrayEspecialidad);

            $Especialidad->insertar();
            header("Location: ../Vista/createProduccion.php?respuesta=correcto");
        } catch (Exception $e) {
           header("Location: ../Vista/createProduccion.php?respuesta=error");
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
            $arrayEspecialidad['idProduccion'] = $_POST['idProduccion'];
            $especial = new Produccion($arrayEspecialidad);
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