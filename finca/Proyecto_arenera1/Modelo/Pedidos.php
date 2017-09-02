<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Pedidos extends db_abstract_class
{
    private $idPedidos;
    private $Cantidad;
    private $Fecha;
    private $Nombre;
    private $Documento;
    private $Ciudad;
    private $Direccion;
    Private $idTipoArena;
    private $Estado;
    private $Confirmacion;
    private $idTransporte;

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Pedidos_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Pedidos_data)>1){ //
            foreach ($Pedidos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idPedidos = "";
            $this->Cantidad = "";
            $this->Fecha="";
            $this->Nombre = "";
            $this->Documento = "";
            $this->Ciudad="";
            $this->Direccion="";
            $this->idTipoArena="";
            $this->Estado="";
            $this->Confirmacion = "";
            $this->idTransporte = "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Pedidos();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM pedidos WHERE idPedidos =?", array($id));
            $Especial->idPedidos = $getrow['idPedidos'];
            $Especial->Cantidad = $getrow['Cantidad'];
            $Especial->Fecha = $getrow['Fecha'];
            $Especial->Nombre = $getrow['Nombre'];
            $Especial->Documento = $getrow['Documento'];
            $Especial->Ciudad = $getrow['Ciudad'];
            $Especial->Direccion = $getrow['Direccion'];
            $Especial->idTipoArena = $getrow['idTipoArena'];
            $Especial->Estado = $getrow['Estado'];
            $Especial->Confirmacion = $getrow['Confirmacion'];
            $Especial->idTransporte = $getrow['idTransporte'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }
    static public function tdContratro($idTipoArena){

        $arrPerson = Arena::buscarForId($idTipoArena);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .="<td>".$arrPerson->getIdContatosPublicos()."Tipo de proceso: ".$arrPerson->getTipoProceso()."</td>";
        return $htmlInput;

    }

    static public function selectPedido ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Pedidos::getAll();
        $htmlSelect = '<select name="idPedidos">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidPedidos()."'>".$clien->getCantidad()." "."</option>";
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

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Pedidos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new pedidos();
            $especial->idPedidos = $valor['idPedidos'];
            $especial->Cantidad = $valor['Cantidad'];
            $especial->Fecha = $valor['Fecha'];
            $especial->Nombre = $valor['Nombre'];
            $especial->Documento = $valor['Documento'];
            $especial->Ciudad = $valor['Ciudad'];
            $especial->Direccion = $valor['Direccion'];
            $especial->idTipoArena = $valor['idTipoArena'];
            $especial->Estado = $valor['Estado'];
            $especial->Confirmacion = $valor['Confirmacion'];
            $especial->idTransporte = $valor['idTransporte'];


            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        if(isset($_SESSION["Tipo_User"]) && $_SESSION["Tipo_User"] != "Administrador"  ) {
            return Pedidos::buscar("SELECT * FROM pedidos where Documento=".$_SESSION['Cedula']);
        }else{
            return Pedidos::buscar("SELECT * FROM pedidos");
        }
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.pedidos VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->Cantidad,
                $this->Fecha,
                $this->Nombre,
                $this->Documento,
                $this->Ciudad,
                $this->Direccion,
                $this->idTipoArena,
                $this->Estado="Inactivo",
                $this->Confirmacion="Inactivo",
                $this->idTransporte="3",


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.pedidos SET Cantidad = ?, Fecha = ?, Nombre = ?, Documento = ?, Ciudad = ?, 
Direccion = ?, idTipoArena = ?, Estado = ?, Confirmacion = ?, idTransporte = ? WHERE idPedidos = ?", array(
            $this->Cantidad,
            $this->Fecha,
            $this->Nombre,
            $this->Documento,
            $this->Ciudad,
            $this->Direccion,
            $this->idTipoArena,
            $this->Estado,
            $this->Confirmacion,
            $this->idTransporte,
            $this->idPedidos,
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
    public function getIdPedidos()
    {
        return $this->idPedidos;
    }

    /**
     * @param string $idPedidos
     */
    public function setIdPedidos($idPedidos)
    {
        $this->idPedidos = $idPedidos;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param string $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
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

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return string
     */
    public function getCiudad()
    {
        return $this->Ciudad;
    }

    /**
     * @param string $Ciudad
     */
    public function setCiudad($Ciudad)
    {
        $this->Ciudad = $Ciudad;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param string $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
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
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getConfirmacion()
    {
        return $this->Confirmacion;
    }

    /**
     * @param mixed $Confirmacion
     */
    public function setConfirmacion($Confirmacion)
    {
        $this->Confirmacion = $Confirmacion;
    }

    /**
     * @return mixed
     */
    public function getidTransporte()
    {
        return $this->idTransporte;
    }

    /**
     * @param mixed $idTransporte
     */
    public function setidTransporte($idTransporte)
    {
        $this->idTransporte = $idTransporte;
    }


    }

