<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Horario extends db_abstract_class
{
    private $idHorario;
    private $Jornada;
    private $HoraInicio;
    private $HoraFinal;



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
            $this->idHorario = "";
            $this->Jornada= "";
            $this->Horas = "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Horario();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM horario WHERE idHorario =?", array($id));
            $Especial->idHorario = $getrow['idHorario'];
            $Especial->Jornada = $getrow['Jornada'];
            $Especial->Horas = $getrow['HoraInicio'];
            $Especial->Horas = $getrow['HoraFinal'];

            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Horario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Horario();
            $especial->idHorario = $valor['idHorario'];
            $especial->Jornada = $valor['Jornada'];
            $especial->HoraInicio= $valor['HoraInicio'];
            $especial->HoraFinal= $valor['HoraFinal'];
            
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Horario::buscar("SELECT * FROM horario");
    }

    public function insertar()
    {

        $this->insertRow("INSERT INTO mydb.horario VALUES (NULL, ?, ?, ?)", array(
            $this->Jornada,
            $this->HoraInicio,
            $this->HoraFinal,
        
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Clientes SET Jornada = ?, Horas = ?, WHERE idHorario = ?", array(
        $this->Jornada,
        $this->Horas,
        $this->idHorario,
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
    public function getIdHorario()
    {
        return $this->idHorario;
    }

    /**
     * @param string $idHorario
     */
    public function setIdHorario($idHorario)
    {
        $this->idHorario = $idHorario;
    }

    /**
     * @return string
     */
    public function getJornada()
    {
        return $this->Jornada;
    }

    /**
     * @param string $Jornada
     */
    public function setJornada($Jornada)
    {
        $this->Jornada = $Jornada;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->HoraInicio;
    }

    /**
     * @param mixed $HoraInicio
     */
    public function setHoraInicio($HoraInicio)
    {
        $this->HoraInicio = $HoraInicio;
    }

    /**
     * @return mixed
     */
    public function getHoraFinal()
    {
        return $this->HoraFinal;
    }

    /**
     * @param mixed $HoraFinal
     */
    public function setHoraFinal($HoraFinal)
    {
        $this->HoraFinal = $HoraFinal;
    }


   }

