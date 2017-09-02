<?php

require_once (__DIR__.'/../Modelo/Lote.php');

if(!empty($_GET['action'])){
    LoteCtrl::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class LoteCtrl
{
    static function main($action){
        if ($action == "crear"){
            LoteCtrl::crear();
        }else if ($action == "editar"){
            LoteCtrl::editar();
        }else if ($action == "buscarID"){
            LoteCtrl::buscarID();
        }
    }
    static public function crear (){
        try {

            $arrayLote = array();
            $arrayLote['Codigo'] = $_POST['Codigo'];
            $arrayLote['FechaCompra'] = $_POST['FechaCompra'];
            $arrayLote['Estado'] = $_POST['Estado'];
            $arrayLote['Valor'] = $_POST['Valor'];
            $Lote = new Lote ($arrayLote);
            $Lote->insertar();
            header("Location: ../vista/Lote.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function editar (){
        try {

            $arrayLote = array();
            $arrayLote['Codigo'] = $_POST['Codigo'];
            $arrayLote['FechaCompra'] = $_POST['FechaCompra'];
            $arrayLote['Estado'] = $_POST['Estado'];
            $arrayLote['Valor'] = $_POST['Valor'];
            $Lote = new Lote ($arrayLote);
            $Lote->insertar();
            header("Location: ../vista/Lote.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function buscarID ($id){
        try {
            return Lote::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuestaA=error");
        }
    }

    public function buscarAll (){
        try {
            return Lote::getAll();
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Lote::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuesta=error");
        }
    }
}