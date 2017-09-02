<?php

/**
 * Created by PhpStorm.
 * User: Acer-Aspire
 * Date: 26/08/2017
 * Time: 20:57
 */
require_once ('conexion.php');
class Insumos extends conexion
{
    private $idIsumos;
    private $Nombre;
    private $Cantidad;
    private $Valor;
    private $LotesDesig;

    public function __construct($Isumos_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Isumos_data)>1){ //
            foreach ($Isumos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idIsumos = "";
            $this->Nombre = "" ;
            $this->Cantidad = "" ;
            $this->Valor= "" ;
            $this->LotesDesig= "" ;

        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return mixed
     */
    public function getidIsumos()
    {
        return $this->idIsumos;
    }

    /**
     * @param mixed $idIsumos
     * @return Insumos
     */
    public function setidIsumos($idIsumos)
    {
        $this->idIsumos = $idIsumos;
        return $this;
    }


    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     * @return Insumos
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * @param mixed $Cantidad
     * @return Insumos
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param mixed $Valor
     * @return Insumos
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLotesDesig()
    {
        return $this->LotesDesig;
    }

    /**
     * @param mixed $lotesDesig
     */
    public function setLotesDesig($LotesDesig)
    {
        $this->lotesDesig = $LotesDesig;
    }


    public static function buscar($query)
    {
        $arrIsumos = array();
        $tmp = new Insumos();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $Isumos = new Insumos();
            $Isumos->idIsumos = $valor['idIsumos'];
            $Isumos->Nombre = $valor['Nombre'];
            $Isumos->Cantidad = $valor['Cantidad'];
            $Isumos->Valor = $valor['Valor'];
            $Isumos->LotesDesig = $valor['LotesDesig'];

            array_push($arrIsumos, $Isumos);
        }
        $tmp->Disconnect();
        return $arrIsumos;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO isumos VALUES (NULL, ?, ?, ?, ?)", array(


                $this->Nombre,
                $this->Cantidad,
                $this->Valor,
                $this->LotesDesig,
                )

        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE Isumos SET  Nombre = ?,  Cantidad = ?, Valor = ?, LotesDesig= ?", array(

            $this->Nombre,
            $this->Cantidad,
            $this->Valor,
            $this->LotesDesig,
        ));
        $this->Disconnect();
    }
    public function  ver()
    {
        $this->selectRow("SELECT * FROM Isumos", Array (

            $this->idIsumos,
            $this->Cantidad,
            $this->Nombre,
            $this->Valor,
            $this->LotesDesig,
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

