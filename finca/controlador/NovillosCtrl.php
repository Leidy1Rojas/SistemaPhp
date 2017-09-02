<?php
require_once ('../modelo/Novillos.php');
if(!empty($_GET['action'])){
    NovillosCtrl::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class NovillosCtrl{
    /**
     * @param $action
     */
    static function main($action)
    {
        if ($action == "crear") {
            NovillosCtrl::crear();
            } else if ($action == "editar") {
                NovillosCtrl::editar();
            }else if ($action == "ver") {
                NovillosCtrl::ver();
            }
    }


    static public function crear()
    {
        try {
            $arrayNovillos = array();

            $arrayNovillos ['Nombre'] = $_POST['Nombre'];
            $arrayNovillos ['EdadPromedio'] = $_POST['EdadPromedio'];
            $arrayNovillos ['FechaIngreso'] = $_POST['FechaIngreso'];
            $arrayNovillos ['Lote'] = $_POST['Lote'];
            $Novillos = new Novillos($arrayNovillos);
            $Novillos->insertar();
            header("Location: ../vista/Novillos.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            // header("Location: ../vista/administrador/registraTra/registraE.html?respuesta=error");

        }
    }
    static public function editar(){
        try {
            $arrayNovillos = array();

            $arrayNovillos ['Nombre'] = $_POST['Nombre'];
            $arrayNovillos ['EdadPromedio'] = $_POST['EdadPromedio'];
            $arrayNovillos ['FechaIngreso'] = $_POST['FechaIngreso'];
            $arrayNovillos ['Lote'] = $_POST['Lote'];
            $Novillos = new Novillos($arrayNovillos);
            $Novillos->editar();
            header("Location: ../vista/Novillos.html?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../vista/Novillos.html?respuesta=error");
        }
    }
      public function buscar ($Query){
        try {
            return Novillos::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/listNovillos.php?respuesta=error");
        }
    }


}