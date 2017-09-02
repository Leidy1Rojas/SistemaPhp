<?php

require_once (__DIR__.'/../Modelo/Arena.php');

if(!empty($_GET['action'])){
    ArenaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ArenaController{

    static function main($action){
        if ($action == "crear"){
            ArenaController::crear();
        }else if ($action == "editar"){
            ArenaController::editar();
        }else if ($action == "buscarID"){
            ArenaController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            ArenaController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            ArenaController::InactivarEspecialidad();
        }
    }
    static public function Arena($id){

        $arrPerson = Arena::buscarForId($id);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .=$arrPerson->getNombre();
        return $htmlInput;

    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Estado'] = $_POST['Estado'];
            $Especialidad = new Arena ($arrayEspecialidad);
            //var_dump($Especialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createArena.php?respuesta=correcto");
        } catch (Exception $e) {
           // header("Location: ../Vista/createArena.php?respuesta=error");
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
            $arrayEspecialidad['Nombre'] = $_POST['Nombres'];
            $arrayEspecialidad['Valor'] = $_POST['Valor'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $especial = new Arena($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/indexA.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarArena.php?respuesta=error");
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
            return Arena::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarArena.php?respuesta=error");
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