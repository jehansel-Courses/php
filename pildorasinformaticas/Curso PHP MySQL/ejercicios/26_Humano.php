<?php

// Definimos la clase
class Humano
{

    // Atributos
    private $cabeza;

    //Métodos
    protected function setCabeza($cabeza)
    {
        //Le damos un valor a un atributo
        $this->cabeza = $cabeza;
    }

    protected function getCabeza()
    {
        // Devolvemos un atributo
        return $this->cabeza;
    }

}
?>