<?php
require_once ('../modelo/Insumos.php');
if(!empty($_GET['action'])){
    IsumosCtrl::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class IsumosCtrl {
    /**
     * @param $action
     */
    static function main($action)
    {
        if ($action == "crear") {
            IsumosCtrl::crear();
            } else if ($action == "editar") {
                IsumosCtrl::editar();
            }else if ($action == "ver") {
                IsumosCtrl::ver();
            }
    }


    static public function crear()
    {
        try {
            $arrayInsumos = array();

            $arrayInsumos ['Nombre'] = $_POST['Nombre'];
            $arrayInsumos ['Cantidad'] = $_POST['Cantidad'];
            $arrayInsumos ['Valor'] = $_POST['Valor'];
            $arrayInsumos ['LotesDesig'] = $_POST['LotesDesig'];
            $Insumos = new Insumos($arrayInsumos);
            $Insumos->insertar();
            header("Location: ../vista/insumos.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            // header("Location: ../vista/administrador/registraTra/registraE.html?respuesta=error");

        }
    }
    static public function editar(){
        try {
            $arrayInsumos = array();

            $arrayInsumos ['Nombre'] = $_POST['Nombre'];
            $arrayInsumos ['Cantidad'] = $_POST['Cantidad'];
            $arrayInsumos ['Valor'] = $_POST['Valor'];
            $arrayInsumos ['LotesDesig'] = $_POST['LotesDesig'];
            $Insumos = new Insumos($arrayInsumos);
            $Insumos->editar();
            header("Location: ../vista/insumos.html?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../vista/insumos.html?respuesta=error");
        }
    }
      public function buscar ($Query){
        try {
            return Insumos::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/listInsumos.php?respuesta=error");
        }
    }
    public function ver (){

        try {

            $arrayInsumos = array();
            $arrayInsumos ['idIsumo'];
            $arrayInsumos ['Nombre'] ;
            $arrayInsumos ['Cantidad'] ;
            $arrayInsumos ['Valor'] ;
            $arrayInsumos ['LotesDesig'];
            $Insumos = new Insumos($arrayInsumos);
            $Insumos->ver();


            header("Location: ../vista/insumos.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);

    }

}}