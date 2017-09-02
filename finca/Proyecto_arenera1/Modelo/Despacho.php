<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Despacho extends db_abstract_class
{
    private $idDespacho;
    private $idTransporte;
    private $idPedidos;
    private $idClientes;
    private $idTipoArena;



    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Clientes_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Clientes_data)>1){ //
            foreach ($Clientes_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idDepacho = "";
            $this->idTransporte= "";
            $this->idPeidos = "";
            $this->idClientes = "";
            $this->idTipoArena = "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Clientes();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM clientes WHERE idClientes =?", array($id));
            $Especial->idClientes = $getrow['idClientes'];
            $Especial->Nombres = $getrow['Nombres'];
            $Especial->Apellidos = $getrow['Apellidos'];
            $Especial->TipoDoc = $getrow['TipoDoc'];
            $Especial->Cedula = $getrow['Cedula'];
            $Especial->Telefono = $getrow['Telefono'];
            $Especial->Contraseña = $getrow['Contraseña'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Clientes();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Clientes();
            $especial->idDespacho = $valor['idClientes'];
            $especial->idTransporte = $valor['idTransporte'];
            $especial->idPedidos = $valor['idPedidos'];
            $especial->idClientes = $valor['idClientes'];
            $especial->idTipoArena = $valor['idTipoArena'];

            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Clientes::buscar("SELECT * FROM despacho");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.despacho VALUES (NULL, ?, ?, ?, ?)", array(
                $this->idTransporte,
                $this->idPedidos,
                $this->idClientes,
                $this->idTipoArena,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {

        $this->updateRow("UPDATE mydb.clientes SET Nombres = ?, Apellidos = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Contraseña = ? WHERE idClientes = ?", array(
            $this->Nombres,
            $this->Apellidos,
            $this->TipoDoc,
            $this->Cedula,
            $this->Telefono,
            $this->Contraseña,
            $this->idClientes,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        return Clientes::buscar("delete from clientes where idCliente=?");
    }

    /**
     * @return mixed
     */
    public function getIdDespacho()
    {
        return $this->idDespacho;
    }

    /**
     * @param mixed $idDespacho
     */
    public function setIdDespacho($idDespacho)
    {
        $this->idDespacho = $idDespacho;
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
     * @return mixed
     */
    public function getIdPedidos()
    {
        return $this->idPedidos;
    }

    /**
     * @param mixed $idPedidos
     */
    public function setIdPedidos($idPedidos)
    {
        $this->idPedidos = $idPedidos;
    }

    /**
     * @return string
     */
    public function getIdClientes()
    {
        return $this->idClientes;
    }

    /**
     * @param string $idClientes
     */
    public function setIdClientes($idClientes)
    {
        $this->idClientes = $idClientes;
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


   }

