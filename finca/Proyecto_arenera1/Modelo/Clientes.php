<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Clientes extends db_abstract_class
{

    private $Nombres;
    private $Apellidos;
    private $TipoDoc;
    private $Cedula;
    private $Telefono;
    private $Contrasena;
    private $TipoUsuario;


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

            $this->Nombres= "";
            $this->Apellidos = "";
            $this->TipoDoc = "";
            $this->Cedula = "";
            $this->Telefono = "";
            $this->Contrasena = "";
            $this->TipoUsuario = "";
        }
    }
    static public function selectCliente ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Clientes::getAll();
        $htmlSelect = '<select name="idClientes">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidClientes ()."'>".$clien->getNombres()." "."</option>";
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
        $Especial = new Clientes();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM clientes WHERE Cedula =?", array($id));
            $Especial->Nombres = $getrow['Nombres'];
            $Especial->Apellidos = $getrow['Apellidos'];
            $Especial->TipoDoc = $getrow['TipoDoc'];
            $Especial->Cedula = $getrow['Cedula'];
            $Especial->Telefono = $getrow['Telefono'];
            $Especial->Contrasena = $getrow['Contrasena'];
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

            $especial->Nombres = $valor['Nombres'];
            $especial->Apellidos = $valor['Apellidos'];
            $especial->TipoDoc = $valor['TipoDoc'];
            $especial->Cedula = $valor['Cedula'];
            $especial->Telefono = $valor['Telefono'];
            $especial->Contrasena = $valor['Contrasena'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Clientes::buscar("SELECT * FROM clientes");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.clientes VALUES ( ?, ?, ?, ?, ?, ?,?)", array(
            $this->Nombres,
        $this->Apellidos,
        $this->TipoDoc,
        $this->Cedula,
        $this->Telefono,
        $this->Contrasena,
                $this->TipoUsuario="Cliente",

            )
        );
        $this->Disconnect();
    }

    public function editar()
    {

        $this->updateRow("UPDATE mydb.clientes SET Nombres = ?, Apellidos = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Contrasena = ? WHERE idClientes = ?", array(
            $this->Nombres,
            $this->Apellidos,
            $this->TipoDoc,
            $this->Cedula,
            $this->Telefono,
            $this->Contrasena,
            $this->idClientes,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        return Clientes::buscar("delete from clientes where idCliente=?");
    }

    public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new Clientes();
        $getTempUser = $tmp->getRows("SELECT * FROM clientes WHERE Cedula = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM clientes WHERE Cedula = '$User' AND Contrasena = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
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
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param string $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param string $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return string
     */
    public function getTipoDoc()
    {
        return $this->TipoDoc;
    }

    /**
     * @param string $TipoDoc
     */
    public function setTipoDoc($TipoDoc)
    {
        $this->TipoDoc = $TipoDoc;
    }

    /**
     * @return string
     */
    public function getCedula()
    {
        return $this->Cedula;
    }

    /**
     * @param string $Cedula
     */
    public function setCedula($Cedula)
    {
        $this->Cedula = $Cedula;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param string $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @return string
     */
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * @param string $Contrasena
     */
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->TipoUsuario;
    }

    /**
     * @param mixed $TipoUsuario
     */
    public function setTipoUsuario($TipoUsuario)
    {
        $this->TipoUsuario = $TipoUsuario;
    }


   }

