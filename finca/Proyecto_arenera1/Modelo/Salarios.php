<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Salarios extends db_abstract_class
{
    private $idSalarios;
    private $Salarios;
    private $Tipos;



    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Salarios_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Salarios_data)>1){ //
            foreach ($Salarios_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idSalarios = "";
            $this->Salarios= "";
            $this->Tipos= "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Salarios();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM salarios WHERE idSalarios =?", array($id));
            $Especial->idSalarios = $getrow['idSalarios'];
            $Especial->Salario = $getrow['Salario'];
            $Especial->Tipos = $getrow['TipoSalario'];

            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Salarios();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Salarios();
            $especial->idSalarios = $valor['idSalarios'];
            $especial->Salarios = $valor['Salario'];
            $especial->Tipos= $valor['TipoSalario'];
            
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

     static function getAll()
    {
        return Salarios::buscar("SELECT * FROM salarios");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mydb.salarios VALUES (NULL, ?, ?)", array(
            $this->Salarios,
                $this->Tipo,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mydb.Clientes SET Jornada = ?, Horas = ?, WHERE idSalarios = ?", array(
        $this->Jornada,
        $this->Horas,
        $this->idSalarios,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**s
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
     * @return string
     */
    public function getSalarios()
    {
        return $this->Salarios;
    }

    /**
     * @param string $Salarios
     */
    public function setSalarios($Salarios)
    {
        $this->Salarios = $Salarios;
    }

    /**
     * @return string
     */
    public function getTipos()
    {
        return $this->Tipos;
    }

    /**
     * @param string $Tipos
     */
    public function setTipos($Tipos)
    {
        $this->Tipos = $Tipos;
    }


   }

