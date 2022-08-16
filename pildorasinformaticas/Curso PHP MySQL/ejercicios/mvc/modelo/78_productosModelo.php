<?php
class ProductosModelo
{
    private $db;
    private $productos;

    public function __construct()
    {
        // Conexión a la base de datos
        require_once("./modelo/78_conectar.php");
        $this->db = Conectar::conexion();

        $this->productos = array();
    } // fin constructor

    public function getProductos()
    {
        // Preparamos la consulta sql    
        $sql = "SELECT * FROM articulos
                WHERE 1";
        //echo "<br>Query: $sql";

        $consulta = $this->db->query($sql);
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->productos[] = $filas;
        }
        //var_dump($this->productos);
        return $this->productos;
    } // fin getProductos()

} // fin clase ProductosModelo
