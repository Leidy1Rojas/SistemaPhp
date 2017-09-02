<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Arena extends db_abstract_class
{
    private $idTipoArena;
    private $Nombre;
    Private $Estado;


    public function __construct($Clientes_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($Clientes_data) > 1) { //
            foreach ($Clientes_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idTipoArena = "";
            $this->Nombre = "";
            $this->Estado = "";


        }
    }
    static public function selectArena ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Arena::getAll();
        $htmlSelect = '<select name="idTipoArena">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidTipoArena()."'>".$clien->getNombre()." "."</option>";
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

    function __destruct()
    {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Arena();
        if ($id > 0) {
            $getrow = $Especial->getRow("SELECT * FROM tipoarena WHERE idTipoArena =?", array($id));
            $Especial->idTipoArena = $getrow['idTipoArena'];
            $Especial->Nombre = $getrow['Nombre'];
            $Especial->Valor = $getrow['Estado'];

            $Especial->Disconnect();
            return $Especial;
        } else {
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Arena();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Arena();
            $especial->idTipoArena = $valor['idTipoArena'];
            $especial->Nombre = $valor['Nombre'];
            $especial->Estado = $valor['Estado'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

    static function getAll()
    {
        return Arena::buscar("SELECT * FROM tipoarena");
    }

    public function insertar()
    {

        $this->insertRow("INSERT INTO mydb.tipoarena VALUES (NULL, ?, ?)", array(
            $this->Nombre,
             $this->Estado,

            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.tipoarena SET Nombre = ?, Valor = ? WHERE idTipoArena = ?", array(
            $this->Nombre,
            $this->Valor,
            $this->idTipoArena,
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
    public function getIdTipoArena()
    {
        return $this->idTipoArena;
    }

    /**
     * @param string $idTipoArena
     */
    public function setIdTipoArena($idTipoArena)
    {
        $this->idTipoArena = $idTipoArena;
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
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }


}

