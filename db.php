<?php

// Clase singleton para realizar la conexión a la base de datos con PostgreSQL
class DB {
    private static $instancia;
    private $conexion;

    private function __construct() {
        $host = 'localhost';
        $puerto = '5432';
        $nombreBD = 'chexter';
        $usuario = 'root';
        $contrasena = '';

        try {
            $this->conexion = pg_connect("
                host=$host
                port=$puerto
                dbname=$nombreBD
                user=$usuario
                password=$contrasena
            ");
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function __destruct() {
        $this->conexion = null;
    }

    public function getConnection() {
        return $this->conexion;
    }
}