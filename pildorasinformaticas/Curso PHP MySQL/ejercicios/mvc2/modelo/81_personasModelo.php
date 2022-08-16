<?php
class PersonasModel
{
    private $db;
    private $personas;

    public function __construct()
    {
        // Conexión a la base de datos
        require_once("./modelo/81_conectar.php");
        $this->db = Conectar::conexion();

        $this->personas = array();
    } // fin constructor

    public function getPersonas()
    {
        require_once("./modelo/81_paginacion.php");
       
        // Preparamos la consulta sql    
        $sql = "SELECT * FROM datosUsuarios
                WHERE 1
                LIMIT $empezarDesde,$tamanoPaginas";
        //echo "<br>Query: $sql";

        $consulta = $this->db->query($sql);
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->personas[] = $filas;
        }
        //var_dump($this->personas);
        return $this->personas;
    } // fin getPersonas()

} // fin clase PersonasModel
