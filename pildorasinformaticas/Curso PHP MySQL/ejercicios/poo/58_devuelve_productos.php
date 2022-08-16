<?php
require("58_conexion_a_bbdd.php");

class DevuelveProductos extends Conexion
{

    public function __construct()
    {
        // Ejecutamos el constructor de la clase padre
        parent::__construct();
    } // fin constructor

    public function getProductos($pais)
    {

        try {
            // Preparamos la consulta sql    
            $sql = "SELECT * FROM articulos 
                    WHERE paisorigen = :pais
                    ORDER BY seccion, nombrearticulo ASC";
            echo "<br>Query: $sql";
            $stmtPDO = $this->conexionDB->prepare($sql);
            $stmtPDO->bindValue(":pais", $pais, PDO::PARAM_STR);

            // Ejecutamos la consulta
            $stmtPDO->execute();

            // Recorremos la data obtenida
            if (!$stmtPDO->rowCount() == 0) {
                $productos = $stmtPDO->fetchAll(PDO::FETCH_ASSOC);
                return $productos;
            } else {
                echo "<br>No se encontraron registros";
                return null;
            }

            $stmtPDO->closeCursor();
        } catch (Exception $e) {
            //die("<br><br>Error: " . $e->getMessage());
            echo "<br><br>Mensaje:" . $e->getMessage();
            echo "<br>Código:" . $e->getCode();
            echo "<br>Archivo:" . $e->getFile();
            echo "<br>Línea:" . $e->getLine();
        } finally {

            $this->conexionDB = null;
        }
    } // fin getProductos()

} // fin clase DevuelveProductos
