<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require_once('Empleados.php');

class Transporte extends db_abstract_class
{
    private $idTransporte;
    private $TipoCarro;
    private $Placa;
    private $Dueno;
    private $idCedula;


    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Transportes_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Transportes_data)>1){ //
            foreach ($Transportes_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idTransporte = "";
            $this->TipoCarro= "";
            $this->Placa = "";
            $this->Conductor = "";
            $this->Due = "";
            $this->idCedula = "";
        }
    }
    static public function selectTransporte ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Transporte::getAll();
        $htmlSelect = '<select name="idTransporte">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidTransporte()."'>".$clien->getTipoCarro()." "."</option>";
            }
            $htmlSelect .= "</select>";
        }
        else
        {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }
    static public function selectempleado ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Empleados::getAll();
        $htmlSelect = '<select name="idCedula">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getCedula()."'>".$clien->getNombres()." "."</option>";
            }
            $htmlSelect .= "</select>";
        }
        else
        {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Transporte();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM transporte WHERE idTransporte =?", array($id));
            $Especial->idTransporte = $getrow['idTransporte'];
            $Especial->TipoCarro = $getrow['TipoCarro'];
            $Especial->Placa = $getrow['Placa'];
            $Especial->Dueno = $getrow['Dueno'];
            $Especial->idCedula = $getrow['idCedula'];

            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Transporte();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Transporte();
            $especial->idTransporte = $valor['idTransporte'];
            $especial->TipoCarro = $valor['TipoCarro'];
            $especial->Placa = $valor['Placa'];
            $especial->Dueno = $valor['Dueno'];
            $especial->idCedula = $valor['idCedula'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Transporte::buscar("SELECT * FROM transporte");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.transporte VALUES (NULL, ?, ?, ?, ?)", array(
            $this->TipoCarro,
        $this->Placa,
        $this->Dueno,
        $this->idCedula,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Transportes SET Nombre = ?, Apellido = ?, TipoCarroDoc = ?, Cedula = ?, Telefono = ?, Password = ?, WHERE idTransporte = ?", array(
            $this->Nombre,
        $this->Apellido,
        $this->TipoCarro,
        $this->Cedula,
        $this->Telefono,
        $this->Password,
             $this->idTransporte,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return string
     */
    public function getIdTransporte()
    {
        return $this->idTransporte;
    }

    /**
     * @param string $idTransporte
     */
    public function setIdTransporte($idTransporte)
    {
        $this->idTransporte = $idTransporte;
    }

    /**
     * @return string
     */
    public function getTipoCarro()
    {
        return $this->TipoCarro;
    }

    /**
     * @param string $TipoCarro
     */
    public function setTipoCarro($TipoCarro)
    {
        $this->TipoCarro = $TipoCarro;
    }

    /**
     * @return string
     */
    public function getPlaca()
    {
        return $this->Placa;
    }

    /**
     * @param string $Placa
     */
    public function setPlaca($Placa)
    {
        $this->Placa = $Placa;
    }

    /**
     * @return mixed
     */
    public function getDueno()
    {
        return $this->Dueno;
    }

    /**
     * @param mixed $Dueno
     */
    public function setDueno($Dueno)
    {
        $this->Dueno = $Dueno;
    }

    /**
     * @return string
     */
    public function getIdCedula()
    {
        return $this->idCedula;
    }

    /**
     * @param string $idCedula
     */
    public function setIdCedula($idCedula)
    {
        $this->idCedula = $idCedula;
    }


   }

