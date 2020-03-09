<?php

class Conexion{
    //database variable
    private $host = 'localhost';
    private $db_name = 'api_jobs';
    private $username = 'root';
    private $password = '';
    //conexion variable
    private $conn;

    //mysql conexion with PDO class 
    public function conectar(){

        $this->conn = null;

        try{

            $this->conn = new PDO("mysql:host=" . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Error de Conexion:' . $e->getMessage();
        }
        // return Conexion 
    return $this->conn;

    }

    

    

    
}

