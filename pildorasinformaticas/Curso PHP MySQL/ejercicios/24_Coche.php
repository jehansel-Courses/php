<?php
include("25_Vehiculo.php");

// Definimos la clase
class Coche extends Vehiculo
{

    // Atributos
    private $modelo;
    private $color;
    private $velocidad;

    // Constructor
    public function __construct($modelo, $color, $velocidad = 0)
    {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->velocidad = $velocidad;
    }

    //Métodos
    public function getColor()
    {
        // Devolvemos un atributo
        return $this->color;
    }

    public function setColor($color)
    {
        //Le damos un valor a un atributo
        $this->color = $color;
    }

    public function acelerar()
    {
        $this->velocidad++;
    }

    public function frenar()
    {
        $this->velocidad--;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function mostrarInfo()
    {

        // Llamamos a otros métodos
        //$info = "<h1>Información del coche:</h1>";
        $info .= "Modelo: " . $this->modelo;

        // Ejecuta el método mostrarInfo() de la clase padre
        $info = parent::mostrarInfo();
        $info .= "<br/> Color: " . $this->getColor();
        $info .= "<br/> Velocidad: " . $this->getVelocidad();

        return $info;
    }
}
