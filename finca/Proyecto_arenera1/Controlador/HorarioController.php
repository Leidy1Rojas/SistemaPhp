 <?php

require_once (__DIR__.'/../Modelo/Horario.php');

if(!empty($_GET['action'])){
    HorarioController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class HorarioController{

    static function main($action){
        if ($action == "crear"){
            HorarioController::crear();
        }else if ($action == "editar"){
            HorarioController::editar();
        }else if ($action == "buscarID"){
            HorarioController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            HorarioController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            HorarioController::InactivarEspecialidad();
        }
    }
    static public function Horario($id){

        $arrPerson = Horario::buscarForId($id);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .=$arrPerson->getJornada();
        return $htmlInput;

    }

    static public function crear (){
        try {

            $arrayEspecialidad = array();
            $arrayEspecialidad['Jornada'] = $_POST['Jornada'];
            $arrayEspecialidad['HoraInicio'] = $_POST['HoraInicio'];
            $arrayEspecialidad['HoraFinal'] = $_POST['HoraFinal'];
            $Especialidad = new Horario ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createHorario.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createHorario.php?respuesta=error");
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
            $arrayEspecialidad['Jornada'] = $_POST['Jornada'];
            $arrayEspecialidad['Hora'] = $_POST['Hora'];
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