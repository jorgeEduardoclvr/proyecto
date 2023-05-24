<?php
class ConexionBD
{
    //Atributos de mi clase
    public $serverName;
    public $userName;
    public $userPassword;
    public $bdName;
    public $hostBD;
    public $dsn;
    public $conn; //objeto de conexion a la bd

    //Constructor
    public function __construct($serverName, $userName, $userPassword, $bdName)
    {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->bdName = $bdName;
        // $this->hostBD = $hostBD;
    }
    //Metodos set y get

    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }
    public function getServerName()
    {
        return $this->serverName;
    }

    //Metodos de accion
    public function conectarBD()
    {

        $this->dsn = "mysql:host=$this->serverName;dbname=$this->bdName";
        try {
            $this->conn = new PDO($this->dsn, $this->userName, $this->userPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($this->conn)) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Fallo la conexion: " . $e->getMessage();
            return false;
        }
    }
}
