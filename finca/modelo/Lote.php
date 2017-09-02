<?php

/**
 * Created by PhpStorm.
 * User: Acer-Aspire
 * Date: 30/08/2017
 * Time: 5:00
 */
require_once ('conexion.php');
class Lote extends conexion
{
    private $IdLote;
    private $Codigo;
    private $FechaCompra;
    private $Estado;
    private $Valor;

    public function __construct($Lote_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Lote_data)>1){ //
            foreach ($Lote_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->IdLote = "";
            $this->Codigo = "";
            $this->FechaCompra = "";
            $this->Estado = "";
            $this->Valor = "";

        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdLote()
    {
        return $this->IdLote;
    }

    /**
     * @param string $IdLote
     * @return Lote
     */
    public function setIdLote($IdLote)
    {
        $this->IdLote = $IdLote;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * @param string $Codigo
     * @return Lote
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getFechaCompra()
    {
        return $this->FechaCompra;
    }

    /**
     * @param string $FechaCompra
     * @return Lote
     */
    public function setFechaCompra($FechaCompra)
    {
        $this->FechaCompra = $FechaCompra;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     * @return Lote
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
        return $this;
    }

    /**
     * @return string
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param string $Valor
     * @return Lote
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
        return $this;
    }


    public static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    public static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    public function insertar()
    {
          $this->insertRow("INSERT INTO Lote VALUES (NULL, ?, ?, ?, ?)", array(

            $this->Codigo,
            $this->FechaCompra,
            $this->Estado,
            $this->Valor,
        )

    );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE Lote SET  Codigo =?, FechaCompra =?, Estado =?,Valor =?", array(

            $this->Codigo,
            $this->FechaCompra,
            $this->Estado,
            $this->Valor,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}