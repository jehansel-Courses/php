<?php
require("57_config.php");

class Conexion {
    
    protected $conexionDB;

    public function __construct() {
        echo "<br>Conectando a la base de datos con mysqli...";
        $this->conexionDB = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        //$this->conexionDB = new mysqli("xxx", DB_USER, DB_PWD, DB_NAME);

        if ($this->conexionDB->connect_errno) {
            echo "<br>Falló al conectar a MySql: " . $this->conexionDB->connect_error;
            return;
        }

        $this->conexionDB->set_charset(DB_CHARSET);
        echo "ok";
    } // fin constructor

} // fin clase Conexion
