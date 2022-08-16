<?php
require("57_conexion_a_bbdd.php");

class DevuelveProductos extends Conexion
{

    public function __construct()
    {
        // Ejecutamos el constructor de la clase padre
        parent::__construct();
    } // fin constructor

    public function getProductos()
    {
        // Definimos el query
        $sql = "SELECT * FROM articulos";
        echo "<br>Query: $sql";

        // Ejecutamos el query
        $stmt = $this->conexionDB->query($sql);

        // Devuelve un array
        $productos = $stmt->fetch_all(MYSQLI_ASSOC);

        return $productos;
    } // fin getProductos()

} // fin clase DevuelveProductos
