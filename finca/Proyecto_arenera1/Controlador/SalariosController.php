<?php

require_once (__DIR__.'/../Modelo/Salarios.php');

if(!empty($_GET['action'])){
    SalariosController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class SalariosController{

    static function main($action){
        if ($action == "crear"){
            SalariosController::crear();
        }else if ($action == "editar"){
            SalariosController::editar();
        }else if ($action == "buscarID"){
            SalariosController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            SalariosController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            SalariosController::InactivarEspecialidad();
        }
    }
    static public function Salarios($id){

        $arrPerson = Salarios::buscarForId($id);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .=$arrPerson->getTipos();
        return $htmlInput;

    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Salarios'] = $_POST['Salarios'];
            $arrayEspecialidad['Tipo'] = $_POST['Tipo'];
            $Especialidad = new Salarios ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createSalarios.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createSalarios.php?respuesta=error");
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
            $arrayEspecialidad['Salario'] = $_POST['Salarios'];
            $especial = new Clientes($arrayEspecialidad);
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
            return Salarios::buscarForId($id);
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