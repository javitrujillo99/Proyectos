<?php

class Conexion extends PDO
{

    private $dsn = "mysql:host=momazos.duckdns.org:443;dbname=momazos";
    //private $dsn = "mysql:host=localhost:3306;dbname=momazos";
    //private $dsn = "mysql:host=localhost;dbname=momazos";
    private $usuario = "pi";
    private $password = "1234";
    //private $usuario = "dwes";
    //private $password = "abc123.";
    private $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct()
    {
        parent::__construct($this->dsn, $this->usuario, $this->password, $this->opciones);
    }

}