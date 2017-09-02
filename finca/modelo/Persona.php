<?php

/**
 * Created by PhpStorm.
 * User: Acer-Aspire
 * Date: 28/08/2017
 * Time: 22:35
 */
require_once ('conexion.php');
class Persona extends conexion
{
    private $IdGanadero;
    private $Documento;
    private $Nombre;
    private $Apellido;
    private $FechaNacimiento;
    private $Usuario;
    private $Contrasenia;

    public function __construct($Isumos_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Isumos_data)>1){ //
            foreach ($Isumos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->IdGanadero = "";
            $this->Documento = "";
            $this->Nombre = "";
            $this->Apellido = "";
            $this->FechaNacimiento = "";
            $this->Usuario = "";
            $this->Contrasenia = "";

        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdGanadero()
    {
        return $this->IdGanadero;
    }

    /**
     * @param string $IdGanadero
     * @return Persona
     */
    public function setIdGanadero($IdGanadero)
    {
        $this->IdGanadero = $IdGanadero;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param string $Documento
     * @return Persona
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
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
     * @return Persona
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * @param string $Apellido
     * @return Persona
     */
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
        return $this;
    }

    /**
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->FechaNacimiento;
    }

    /**
     * @param string $FechaNacimiento
     * @return Persona
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
        $this->FechaNacimiento = $FechaNacimiento;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * @param string $Usuario
     * @return Persona
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getContrasenia()
    {
        return $this->Contrasenia;
    }

    /**
     * @param string $Contrasenia
     * @return Persona
     */
    public function setContrasenia($Contrasenia)
    {
        $this->Contrasenia = $Contrasenia;
        return $this;
    }



    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO Ganadero VALUES (NULL, ?, ?, ?, ?, ?, ?)", array(

            $this->Documento,
            $this->Nombre,
            $this->Apellido,
            $this->FechaNacimiento,
            $this->Usuario,
            $this->Contrasenia,
            )

        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE Ganadero SET Documento=?, Nombre = ?, Apellido = ?, FechaNacimiento=? , Usuario=?, Contrasenia = ?, WHERE idEmpleados = ?", array(

                $this->Documento,
                $this->Nombre,
                $this->Apellido,
                $this->FechaNacimiento,
                $this->Usuario,
                $this->Contrasenia,

        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new Persona();
        $getTempUser = $tmp->getRows("SELECT * FROM Ganadero WHERE Usuario = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM Ganadero WHERE Usuario= '$User' AND Contrasena = '$Password'");
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
}