<?php

// Definimos la clase
class CompraVehiculo
{
    // Atributos
    private $precioBase;
    private static $ayuda = 0;

    public function __construct($gama)
    {
        if ($gama == "urbano") {
            $this->precioBase = 10000;
        } else if ($gama == "compacto") {
            $this->precioBase = 20000;
        } else if ($gama == "berlina") {
            $this->precioBase = 30000;
        }
    } // fin constructor

    static public function descuentoGobierno()
    {

        $fecha = new DateTime("18 May 2021");
        $hoy = new DateTime("now");
        echo "<br>Fecha = " . $fecha->format("d-m-y");
        echo "<br>Hoy = " . $hoy->format("d-m-y");;
        $descuento = $hoy > $fecha;
        echo "<br>Descuento = " . $descuento;

        $descuento2 = (date("m-d-y") > "05-18-21");
        echo "<br>Descuento2 = " . $descuento2;

        if ($descuento) {
            self::$ayuda = 4500;
        }
    }

    public function climatizador()
    {
        $this->precioBase += 2000;
    } // fin climatizador

    public function navegadorGPS()
    {
        $this->precioBase += 2500;
    } // fin navegadorGPS

    public function tapiceriaCuero($color)
    {
        if ($color == "blanco") {
            $this->precioBase += 3000;
        } else if ($color == "beige") {
            $this->precioBase += 3500;
        } else {
            $this->precioBase += 5000;
        }
    } // fin tapiceriaCuero

    public function precioFinal()
    {
        $valorFinal = $this->precioBase - self::$ayuda;
        return $valorFinal;
    } // fin precioFinal   

} // class CompraVehiculo
