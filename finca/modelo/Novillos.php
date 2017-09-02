<?php

/**
 * Created by PhpStorm.
 * User: Acer-Aspire
 * Date: 26/08/2017
 * Time: 20:57
 */
require_once ('conexion.php');
class Novillos extends conexion
{
    private $idNovillos;
    private $Nombre;
    private $EdadPromedio;
    private $FechaIngreso;
    private $Lote;

    public function __construct($Novillos_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Novillos_data)>1){ //
            foreach ($Novillos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idNovillos = "";
            $this->Nombre = "" ;
            $this->EdadPromedio = "" ;
            $this->FechaIngreso = "" ;
            $this->Lote= "" ;

        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdNovillos()
    {
        return $this->idNovillos;
    }

    /**
     * @param string $idNovillos
     * @return Novillos
     */
    public function setIdNovillos($idNovillos)
    {
        $this->idNovillos = $idNovillos;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     * @return Novillos
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getEdadPromedio()
    {
        return $this->EdadPromedio;
    }

    /**
     * @param string $EdadPromedio
     * @return Novillos
     */
    public function setEdadPromedio($EdadPromedio)
    {
        $this->EdadPromedio = $EdadPromedio;
        return $this;
    }

    /**
     * @return string
     */
    public function getFechaIngreso()
    {
        return $this->FechaIngreso;
    }

    /**
     * @param string $FechaIngreso
     * @return Novillos
     */
    public function setFechaIngreso($FechaIngreso)
    {
        $this->FechaIngreso = $FechaIngreso;
        return $this;
    }

    /**
     * @return string
     */
    public function getLote()
    {
        return $this->Lote;
    }

    /**
     * @param string $Lote
     * @return Novillos
     */
    public function setLote($Lote)
    {
        $this->Lote = $Lote;
        return $this;
    }


    public static function buscar($query)
    {
        $arrNovillos = array();
        $tmp = new Novillos ();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $Novillos = new Novillos();
            $Novillos->idNovillos = $valor['idNovillos'];
            $Novillos->Nombre = $valor['Nombre'];
            $Novillos->EdadPromedio = $valor['EdadPromedio'];
            $Novillos->FechaIngreso = $valor['FechaIngreso'];
            $Novillos->Lote = $valor['Lote'];

            array_push($arrNovillos, $Novillos);
        }
        $tmp->Disconnect();
        return $arrNovillos;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO novillos VALUES (NULL, ?, ?, ?, ?)", array(


                $this->Nombre,
                $this->EdadPromedio,
                $this->FechaIngreso,
                $this->Lote,
                )

        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE novillos SET  Nombre = ?,  EdadPromedio = ?, FechaIngreso = ?, Lote= ?", array(

            $this->Nombre,
            $this->EdadPromedio,
            $this->FechaIngreso,
            $this->Lote,
        ));
        $this->Disconnect();
    }
   
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }
}

