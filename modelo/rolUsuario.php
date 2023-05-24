<?php
class RolUsuario
{
    // Atributos
    private $idRol;
    private $nombreRol;

    // Constructor
    public function __construct($idRol, $nombreRol)
    {
        $this->idRol = $idRol;
        $this->nombreRol = $nombreRol;
    }

    // Métodos set y get
    public function getIdRol()
    {
        return $this->idRol;
    }

    public function getNombreRol()
    {
        return $this->nombreRol;
    }
}
?>