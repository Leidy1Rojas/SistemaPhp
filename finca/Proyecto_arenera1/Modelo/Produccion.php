<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Produccion extends db_abstract_class
{
    private $idProduccion;
    private $Cantidad;
    private $Fecha;
    private $idTipoArena;


    public function __construct($Produccion_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Produccion_data)>1){ //
            foreach ($Produccion_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idProduccion = "";
            $this->Cantidad= "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Produccion();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM Cliente WHERE idProduccion =?", array($id));
            $Especial->idProduccion = $getrow['idProduccion'];
            $Especial->Cantidad = $getrow['Cantidad'];
            $Especial->Fecha = $getrow['Fecha'];

            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Produccion();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Produccion();
            $especial->idProduccion = $valor['idProduccion'];
            $especial->Cantidad = $valor['Cantidad'];
            $especial->Fecha = $valor['Fecha'];
            $especial->idTipoArena = $valor['idTipoArena'];

            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Produccion::buscar("SELECT * FROM produccion");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.produccion VALUES (NULL, ?,?,?)", array(
            $this->Cantidad,
                $this->Fecha,
                $this->idTipoArena,

            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Clientes SET Nombre = ?, Apellido = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Password = ?, WHERE idClientes = ?", array(
            $this->Nombre,
        $this->Apellido,
        $this->Tipo,
        $this->Cedula,
        $this->Telefono,
        $this->Password,
             $this->idClientes,
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
    public function getIdProduccion()
    {
        return $this->idProduccion;
    }

    /**
     * @param string $idProduccion
     */
    public function setIdProduccion($idProduccion)
    {
        $this->idProduccion = $idProduccion;
    }

    /**
     * @return string
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * @param string $Cantidad
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }

    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getIdTipoArena()
    {
        return $this->idTipoArena;
    }

    /**
     * @param mixed $idTipoArena
     */
    public function setIdTipoArena($idTipoArena)
    {
        $this->idTipoArena = $idTipoArena;
    }

   }

