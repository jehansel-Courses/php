<?php
include("26_Humano.php");

// Definimos la clase
class Persona extends Humano
{

    // Atributos
    private $genero;

    //Métodos
    public function setGenero($genero)
    {
        //Le damos un valor a un atributo
        $this->genero = $genero;
    }

    public function getGenero()
    {
        // Devolvemos un atributo
        return $this->genero;
    }

    public function setParteCuerpo($parteCuerpo) {
        parent::setCabeza($parteCuerpo);
    }

    public function getParteCuerpo() {
        return parent::getCabeza();

    }

}
?>