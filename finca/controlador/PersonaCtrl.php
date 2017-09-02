<?php

require_once (__DIR__.'/../Modelo/Persona.php');

if(!empty($_GET['action'])){
    PersonaCtrl::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
} 
class PersonaCtrl
{
    static function main($action){
        if ($action == "crear"){
            PersonaCtrl::crear();
        }else if ($action == "editar"){
            PersonaCtrl::editar();
        }else if ($action == "buscarID"){
            PersonaCtrl::buscarID();
        }else if($action == "Login"){
            PersonaCtrl::Login();
        }else if($action == "CerrarSession"){
            PersonaCtrl::CerrarSession();
        }
    }

    static public function crear (){
        try {

            $arrayPersona = array();
            $arrayPersona['Documento'] = $_POST['Documento'];
            $arrayPersona['Nombre'] = $_POST['Nombre'];
            $arrayPersona['Apellido'] = $_POST['Apellido'];
            $arrayPersona['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasenia'] = $_POST['Contrasenia'];

            $Persona = new Persona ($arrayPersona);
            $Persona->insertar();
            header("Location: ../vista/persona.html?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function editar (){
        try {
            $arrayPersona = array();
            $arrayPersona['Documento'] = $_POST['Documento'];
            $arrayPersona['Nombre'] = $_POST['Nombre'];
            $arrayPersona['Apellido'] = $_POST['Apellido'];
            $arrayPersona['FechaNacimiento'] = $_POST['FechaNacimiento'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasenia'] = $_POST['Contrasenia'];

            $Persona = new Persona ($arrayPersona);
            $Persona->insertar();
            header("Location: ../vista/persona.html?respuesta=correcto");
        } catch (Exception $e) {
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function buscarID ($id){
        try {
            return Pedidos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuestaA=error");
        }
    }

    public function buscarAll (){
        try {
            return Pedidos::getAll();
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../ListPersonas?respuesta=error");
        }
    }
    public function Login (){
        try {
            $User = $_POST['User'];
            $Password = $_POST['Password'];
            if(!empty($User) && !empty($Password)){
                $respuesta = Persona::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['Documento'] = $respuesta['Documento'];
                    $_SESSION['Nombre'] = $respuesta['Nombre'];

                    echo TRUE;
                }else if($respuesta == "Password Incorrectow"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";

                }else if($respuesta == "No existe el Usuario"){
                    echo "<div class='row'>";
                    echo "<div class='alert alert-success'>";
                    echo "<button class='close' data-dismiss='alert'><span>&times;</span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos!!</p>";
                    echo"</button>";
                    echo " </div>";
                    echo"</div>";
                }

            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            var_dump($e);
            header("Location: ../vista/indexA.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../vista/indexA.php");
    }

}