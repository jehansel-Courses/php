<?php
// Definimos la clase
class Vehiculo
{

    // Atributos
    private $peso;

    //Métodos
    public function getPeso()
    {
        // Devolvemos un atributo
        return $this->peso;
    }

    public function setPeso($peso)
    {
        //Le damos un valor a un atributo
        $this->peso = $peso;
    }

    
    protected function mostrarInfo()
    {

        // Llamamos a otros métodos
        $info = "<h1>Información del vehiculo:</h1>";
        //$info .= "Modelo: " . $this->modelo;
        //$info .= "<br/> Color: " . $this->getColor();
        //$info .= "<br/> Velocidad: " . $this->getVelocidad();

        return $info;
    }
    
}
