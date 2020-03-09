<?php

class Jobs
{

    //database variables
    private $conn;
    private $table = 'jobs';
    private $table_processor = 'job_processors';

    //Global Variables
    public $priority_level;
    public $priority;
    public $id_job;
    public $id_client;
    public $id_job_processor;
    public $title;
    public $description;
    public $last_date;


    public function __construct($db)
    {
        //database conexion
        $this->conn = $db;
    }

    //read method
    public function read()
    {
        //prepare sql query
        $query = 'SELECT 
        p.priority_level,
        p.priority,
        j.id_job,
        j.id_client,
        j.id_job_processor,
        j.title,
        j.description,
        j.last_date
        FROM '.$this->table_processor.' p, ' . $this->table . ' j
        WHERE p.id_job_processor = j.id_job_processor
        ORDER BY j.last_date DESC 
        ';

        //prepare Statements 
        $stmt = $this->conn->prepare($query);
        //execute statement
        $stmt->execute();
        //return statement
        return $stmt;
    }

    // read single data
    public function read_only()
    {
        $query = 'SELECT 
            p.priority_level,
            p.priority,
            j.id_job,
            j.id_client,
            j.id_job_processor,
            j.title,
            j.description,
            j.last_date 
            FROM '.$this->table_processor.' p, ' . $this->table . ' j
            WHERE p.id_job_processor = j.id_job_processor AND
            id_job = :id_job
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        // bind paramaters
        $stmt->bindParam(":id_job", $this->id_job);

        //execute query 
        $stmt->execute();
        
        // sabe on a row data
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //create the object response
        $this->priority_level = $row['priority_level'];
        $this->priority = $row['priority'];
        $this->id_job = $row['id_job'];
        $this->id_client = $row['id_client'];
        $this->id_job_processor = $row['id_job_processor'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->last_date = $row['last_date'];
    }

    public function create()
    {
        //prepare sql query
        $query = ' INSERT INTO ' . $this->table . '
        SET 
        id_client = :id_client,
        id_job_processor = :id_job_processor,
        title = :title,
        description = :description,
        last_date = :last_date
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //bind parameters
        $stmt->bindParam(":id_client", $this->id_client);
        $stmt->bindParam(":id_job_processor", $this->id_job_processor);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":last_date", $this->last_date);

        //execute query 
        if ($stmt->execute()) {

            return true;
        }

        //print error if something goes wrong

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function update()
    {
        //prepare sql query
        $query = 'UPDATE ' . $this->table . '
        SET 
        id_job = :id_job,
        id_client = :id_client,
        id_job_processor = :id_job_processor,
        title = :title,
        description = :description,
        last_date = :last_date
        WHERE 
        id_job = :id_job
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);


        //bind parameters
        $stmt->bindParam(":id_job", $this->id_job);
        $stmt->bindParam(":id_client", $this->id_client);
        $stmt->bindParam(":id_job_processor", $this->id_job_processor);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":last_date", $this->last_date);

        if ($stmt->execute()) {
            // return true to an if statement
            return true;
        }

        //print error if something goes wrong

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete(){
        $query = 'DELETE FROM '.$this->table.'
        WHERE id_job = :id_job';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //bind parameters 
        $stmt->bindParam(":id_job", $this->id_job);

        //execute
        if ($stmt->execute()) {
            // return true to an if statement
            return true;
        }

        //print error if something goes wrong

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}
