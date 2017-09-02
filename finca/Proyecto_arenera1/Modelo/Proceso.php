<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require_once('Arena.php');

class Proceso extends db_abstract_class
{
    private $idProceso;
    private $Tipo;
    private $Seleccion;
    private $idArena;
   


    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Procesos_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Procesos_data)>1){ //
            foreach ($Procesos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idProcesos = "";
            $this->Tipo= "";
            $this->Placa = "";
            $this->Conductor = "";
            $this->Due = "";
            $this->idEmpleados = "";
        }
    }
    static public function selectarena ($isRequired=true, $id, $nombre, $class){
        $arrclientes = Arena::getAll();
        $htmlSelect = '<select name="Arena">';
        $htmlSelect .= "<option value='nada'>Seleccione</option>";
        if(count($arrclientes)>0){
            foreach ($arrclientes as $clien){
                $htmlSelect .= "<option value='".$clien->getidArena()."'>".$clien->getNombre()." "."</option>";
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
            $getrow = $Especial->getRow("SELECT * FROM Proceso WHERE idProceso =?", array($id));
            $Especial->idProceso = $getrow['idPedidos'];
            $Especial->Nombre = $getrow['Cantidad'];
            $Especial->Apellido = $getrow['TipoProceso'];
            $Especial->Tipo = $getrow['Proceso'];
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
        $tmp = new Proceso();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Procesos();
            $especial->idProcesos = $valor['idProcesos'];
            $especial->Tipo = $valor['Tipo'];
            $especial->Placa = $valor['Placa'];
            $especial->Conductor = $valor['Conductor'];
            $especial->Due = $valor['Due'];
            $especial->idEmpleados = $valor['IdEmpelados'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Proceso::buscar("SELECT * FROM Proceso");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.proceso VALUES (NULL, ?, ?, ?)", array(
            $this->Tipo,
        $this->Seleccion,
        $this->idArena,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Procesos SET Nombre = ?, Apellido = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Password = ?, WHERE idProcesos = ?", array(
            $this->Nombre,
        $this->Apellido,
        $this->Tipo,
        $this->Cedula,
        $this->Telefono,
        $this->Password,
             $this->idProcesos,
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
    public function getConductor()
    {
        return $this->Conductor;
    }

    /**
     * @param string $Conductor
     */
    public function setConductor($Conductor)
    {
        $this->Conductor = $Conductor;
    }

    /**
     * @return mixed
     */
    public function getIdProceso()
    {
        return $this->idProceso;
    }

    /**
     * @param mixed $idProceso
     */
    public function setIdProceso($idProceso)
    {
        $this->idProceso = $idProceso;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param string $Tipo
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;
    }

    /**
     * @return mixed
     */
    public function getSeleccion()
    {
        return $this->Seleccion;
    }

    /**
     * @param mixed $Seleccion
     */
    public function setSeleccion($Seleccion)
    {
        $this->Seleccion = $Seleccion;
    }

    /**
     * @return mixed
     */
    public function getIdArena()
    {
        return $this->idArena;
    }

    /**
     * @param mixed $idArena
     */
    public function setIdArena($idArena)
    {
        $this->idArena = $idArena;
    }


   }

