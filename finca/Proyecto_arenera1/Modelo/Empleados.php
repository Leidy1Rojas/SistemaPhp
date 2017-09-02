
<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */
require_once ('Horario.php');
require_once ('Salarios.php');
require_once('db_abstract_class.php');

class Empleados extends db_abstract_class
{

    private $Nombres;
    private $Apellidos;
    private $Cedula;
    private $Telefono;
    private $Direccion;
    private $Cargo;
    private $Contrasena;
    private $idHorario;
    private $idSalarios;



    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Empleados_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Empleados_data)>1){ //
            foreach ($Empleados_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idEmpleados = "";
            $this->Nombres= "";
            $this->Apellidos = "";
            $this->Cedula = "";
            $this->Telefono = "";
            $this->Direccion = "";
            $this->Cargo = "";
            $this->idHorario = "";
            $this->idSalario = "";

        }
    }

    static public function selecthorario ($isRequired=true, $id, $nombre, $class){
    $arrclientes = Horario::getAll();
    $htmlSelect = '<select name="horario">';
    $htmlSelect .= "<option value='nada'>Seleccione</option>";
       // $htmlSelect .= "<option value='nada'>$nombre</option>";
    if(count($arrclientes)>0){
        foreach ($arrclientes as $clien){
            $htmlSelect .= "<option value='".$clien->getidHorario()."'>".$clien->getjornada()." "."</option>";
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
    static public function selectSalarios ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Salarios::getAll();
        $htmlSelect = '<select name="salario">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidSalarios()."'>".$clien->getTipos()." "."</option>";
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
        $Especial = new Pedidos();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM Cliente WHERE idCliente =?", array($id));
            $Especial->idEmpleados = $getrow['idPedidos'];
            $Especial->Nombres = $getrow['Cantidad'];
            $Especial->Apellido = $getrow['TipoTransporte'];
            $Especial->Tipo = $getrow['Cliente'];
            $Especial->Cedula = $getrow['Estado'];
            $Especial->Telefono = $getrow['Telefono'];
            $Especial->Password = $getrow['Password'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Empleados();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Empleados();

            $especial->Nombres = $valor['Nombres'];
            $especial->Apellidos = $valor['Apellidos'];
            $especial->Cedula = $valor['Cedula'];
            $especial->Telefono = $valor['Telefono'];
            $especial->Direccion = $valor['Direccion'];
            $especial->Cargo = $valor['Cargo'];
            $especial->idHorario = $valor['idHorario'];
            $especial->idSalarios = $valor['idSalarios'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Empleados::buscar("SELECT * FROM empleados");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.empleados VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)", array(
            $this->Nombres,
             $this->Apellidos,
             $this->Cedula,
             $this->Telefono,
                $this->Direccion,
                $this->Cargo,
                $this->Contrasena,
                $this->idSalario,
                $this->idHorario,


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Empleados SET Nombre = ?, Apellido = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Password = ?, WHERE idEmpleados = ?", array(
            $this->Nombre,
        $this->Apellido,
        $this->Tipo,
        $this->Cedula,
        $this->Telefono,
        $this->Password,
             $this->idEmpleados,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
    }
    public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new Empleados();
        $getTempUser = $tmp->getRows("SELECT * FROM empleados WHERE Cedula = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM empleados WHERE Cedula = '$User' AND Contrasena = '$Password'");
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

    
    public function getIdEmpleados()
    {
        return $this->idEmpleados;
    }

    /**
     * @param string $idEmpleados
     */
    public function setIdEmpleados($idEmpleados)
    {
        $this->idEmpleados = $idEmpleados;
    }

    /**
     * @return string
     */


    /**
     * @return string
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param string $Nombre
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
     * @param string $Apellido
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
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
    public function getCargo()
    {
        return $this->Cargo;
    }

    /**
     * @param string $Cargo
     */
    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;
    }

    /**
     * @return mixed
     */
    public function getIdHorario()
    {
        return $this->idHorario;
    }

    /**
     * @param mixed $idHorario
     */
    public function setIdHorario($idHorario)
    {
        $this->idHorario = $idHorario;
    }

    /**
     * @return mixed
     */
    public function getIdSalarios()
    {
        return $this->idSalarios;
    }

    /**
     * @param mixed $idSalarios
     */
    public function setIdSalarios($idSalarios)
    {
        $this->idSalarios = $idSalarios;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * @param mixed $Contrasena
     */
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;
    }




   }

