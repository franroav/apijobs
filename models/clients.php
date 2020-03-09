<?php

class Clients
{

    //database variables
    private $conn;
    private $table = 'clients';

    //Global Variables
    public $id_client;
    public $name;
    public $lastname;
    public $phone;
    public $mail;

    //constructor method
    public function __construct($db)
    {
        //database conexion
        $this->conn = $db;
    }
    //read all data method
    public function read()
    {
        //prepare sql query
        $query = ' SELECT * FROM ' . $this->table . '
        ORDER BY id_client DESC
        ';

        //prepare the statement
        $stmt = $this->conn->prepare($query);
        //execute the statement
        $stmt->execute();
        //  retorno 
        return $stmt;
    }
    // read single data
    public function read_only()
    {
        $query = 'SELECT 
        id_client,
        name,
        lastname,
        phone,
        mail
        FROM ' . $this->table . ' 
        WHERE id_client = :id_client';

        //prepare the statement
        $stmt = $this->conn->prepare($query);
        // bind the parameters
        $stmt->bindParam(":id_client", $this->id_client);

        //execute the statement 
        $stmt->execute();

        //row the only fetch data
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Asign values to are variables

        $this->id_client = $row["id_client"];
        $this->name = $row["name"];
        $this->lastname = $row["lastname"];
        $this->phone = $row["phone"];
        $this->mail = $row["mail"];
    }
    //create method
    public function create()
    {

        //prepare sql query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        name = :name,
        lastname = :lastname,
        phone = :phone,
        mail = :mail
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        // bind paramaters
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":mail", $this->mail);

        //execute query 

        if ($stmt->execute()) {
            //return true to an if statement
            return true;
        }

        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
    //update method
    public function update()
    {
        //prepare sql query
        $query = 'UPDATE ' . $this->table . '
        SET 
        id_client = :id_client,
        name = :name,
        lastname = :lastname,
        phone = :phone,
        mail = :mail 
        WHERE 
        id_client = :id_client
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        // bind paramaters
        $stmt->bindParam(":id_client", $this->id_client);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":mail", $this->mail);

        if ($stmt->execute()) {
            //return true to an if statement
            return true;
        }

        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete()
    {
        //prepare sql query
        $query = 'DELETE FROM ' . $this->table . '
            WHERE id_client = :id_client    
        ';

        //prepare statement 
        $stmt = $this->conn->prepare($query);

        //bind parameters 
        $stmt->bindParam(":id_client", $this->id_client);

        //if its execute and return true,  echo out.
        if ($stmt->execute()) {
            //return true to an if statement
            return true;
        }

        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
