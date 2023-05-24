<?php
// include_once("rolUsuario.php");
include_once("conexionBD.php");

class Login
{
    // Atributos
    private $idlogin;
    private $nombreLogin;
    private $claveLogin;
    private $idRolUsuario;
    //public RolUsuario $objRolUsuario;
    //public conexionBD $objConexionBD;
    private $stmt;

    // Constructor
    public function __construct($nombreLogin, $claveLogin)
    {
        $this->nombreLogin = $nombreLogin;
        $this->claveLogin =  $claveLogin;
    }

    // Métodos set y get
    // Nombre
    public function getNombreLogin()
    {
        return $this->nombreLogin;
    }

    public function setNombreLogin($nombreLogin)
    {
        $this->nombreLogin = $nombreLogin;
        return $this;
    }

    // Clave
    public function getClaveLogin()
    {
        return $this->claveLogin;
    }

    public function setClaveLogin($claveLogin)
    {
        $this->claveLogin = $claveLogin;
        return $this;
    }

    // Rol
    public function getRol()
    {
        return $this->idRolUsuario;
    }

    public function setRol($idRolUsuario)
    {
        $this->idRolUsuario = $idRolUsuario;
        return $this;
    }
    // obtener el id de la tabla  login
    public function getIdLogin()
    {
        return $this->idlogin;
    }

    public function setIdLogin($idlogin)
    {
        $this->idlogin = $idlogin;
        return $this;
    }
// ...

// ...

public function validarLogin()
{
    $objConexionBD = new conexionBD('localhost:3306', 'root', '', 'Proyecto_Final');
    try {
        if ($objConexionBD->conectarBD()) {
            $this->stmt = $objConexionBD->conn->prepare("call sp_ValidarLogin(:nombreLogin,:claveLogin)");
            $this->stmt->bindParam(":nombreLogin", $this->nombreLogin);
            $this->stmt->bindParam(":claveLogin", $this->claveLogin);

            $this->stmt->execute();

            $datosConsulta = $this->stmt->fetch();
            session_start();
            if ($datosConsulta) {
                $_SESSION['usuarioValido'] = $datosConsulta['usuario'];
                $_SESSION['claveUsuario'] = $datosConsulta['contrasena'];
                $this->idRolUsuario = $datosConsulta['idRolUsuario'];
                $this->idlogin = $datosConsulta['idlogin'];

                return true;
            } else {
                return false;
            }
        }
    } catch (\PDOException $e) {
        echo "Error de sintaxis de SQL y/o conexión: " . $e->getMessage();
    }
}


public function redireccionarSegunRol()
{
    switch ($this->idRolUsuario) {
        case 1: // ID del rol para administrador
            header('Location: ../vista/paginas/php/indexAdmin.php');
            break;

        case 2: // ID del rol para usuario
            header('Location: ../vista/paginas/php/indexUsuario.php');
            break;

        default:
            header('Location: ../vista/paginas/login.html');
            echo "Rol de usuario inválido";
            break;
    }
}

}
