<?php


class JobProcessor
{

    //Database Variable
    private $table = 'job_processors';
    private $conn;

    //Global Variables
    public $id_processor;
    public $id_job_processor;
    public $priority_level;
    public $priority;

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
        $query = 'SELECT * FROM ' . $this->table . '
        ORDER BY id_processor ASC
        ';

        //prepare statement 
        $stmt = $this->conn->prepare($query);
        //execute
        $stmt->execute();
        //return 
        return $stmt;
    }
    public function read_only()
    {
        // read single data
        $query = 'SELECT 
        id_processor, 
        id_job_processor,
         priority_level,
        priority
        FROM ' . $this->table . '
        WHERE id_processor = :id_processor
        ';

        //prepare the statement 
        $stmt = $this->conn->prepare($query);
        //bind parameter 
        $stmt->bindParam(":id_processor", $this->id_processor);
        //execute statement
        $stmt->execute();

        //row data
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //asing value to the object model
        $this->id_processor = $row["id_processor"];
        $this->id_job_processor = $row["id_job_processor"];
        $this->priority_level = $row["priority_level"];
        $this->priority = $row["priority"];
    }
    //create method
    public function create()
    {
        //prepare sql query
        $query = 'INSERT INTO ' . $this->table . '
        SET 
        id_job_processor = :id_job_processor,
        priority_level = :priority_level,
        priority = :priority';

        //instantiate the statement
        $stmt = $this->conn->prepare($query);

        //bind parameters
        $stmt->bindParam(":id_job_processor", $this->id_job_processor);
        $stmt->bindParam(":priority_level", $this->priority_level);
        $stmt->bindParam(":priority", $this->priority);

        //execute query 
        if ($stmt->execute()) {
            // return true to an if statement
            return true;
        } else {

            //print error if something goes wrong

            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }

    public function update()
    {
        //prepare sql query
        $query = 'UPDATE ' . $this->table . '
        SET 
        id_processor = :id_processor,
        id_job_processor = :id_job_processor,
        priority_level = :priority_level,
        priority = :priority
        WHERE id_processor = :id_processor
        ';

        //instantiate the statement
        $stmt = $this->conn->prepare($query);

        //bind parameters
        $stmt->bindParam(":id_processor", $this->id_processor);
        $stmt->bindParam(":id_job_processor", $this->id_job_processor);
        $stmt->bindParam(":priority_level", $this->priority_level);
        $stmt->bindParam(":priority", $this->priority);

        //execute query 
        if ($stmt->execute()) {
            // return true to an if statement
            return true;
        } else {

            //print error if something goes wrong

            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }

    public function delete()
    {
        //prepare sql query
        $query = 'DELETE FROM ' . $this->table . '
        WHERE id_processor = :id_processor
        ';

        //prepare statement 
        $stmt = $this->conn->prepare($query);

        //bind Parameter
        $stmt->bindParam(":id_processor", $this->id_processor);

        if ($stmt->execute()) {
            return true;
        }

        //print error if something goes wrong

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
