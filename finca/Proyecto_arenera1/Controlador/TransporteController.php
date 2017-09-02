<?php

require_once (__DIR__.'/../Modelo/Transporte.php');

if(!empty($_GET['action'])){
    TransporteController::main($_GET['action']);
}else{
    return "No se encontro ninguna accion...";
}

class TransporteController{

    static function main($action){
        if ($action == "crear"){
            TransporteController::crear();
        }else if ($action == "editar"){
            TransporteController::editar();
        }else if ($action == "buscarID"){
            TransporteController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            TransporteController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            TransporteController::InactivarEspecialidad();
        }else if ($action == "transporte"){
            TransporteController::transporte();
        }
    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['TipoCarro'] = $_POST['TipoCarro'];
            $arrayEspecialidad['Placa'] = $_POST['Placa'];
            $arrayEspecialidad['Dueno'] = $_POST['Dueno'];
            $arrayEspecialidad['idCedula'] = $_POST['idCedula'];
            $Especialidad = new Transporte ($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createTransporte.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createTransporte.php?respuesta=error");
        }
}
    static public function transporte($id){

        $arrPerson = Transporte::buscarForId($id);
        $htmlInput ="";
        // var_dump($arrPerson);
       $htmlInput .=$arrPerson->getTipoCarro();
        return $htmlInput;

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
            $arrayEspecialidad['idTransporte'] = $_POST['idTransporte'];
            $especial = new Transporte($arrayEspecialidad);
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
            return Transporte::buscarForId($id);
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