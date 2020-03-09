<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//model conexion
require_once "../../models/conexion.php";
//model jobs
require_once "../../models/jobs.php";

//instantiate database
$database = new Conexion();

//sabe db variable for the constructor object model 
$conn = $database->conectar();

//Instantiate the object model
$jobs = new Jobs($conn);

//Instantiate the method read and return an array of jobs table
$result = $jobs->read();

// count rows, method to count  rows of jobs
$num = $result->rowCount();

//condition if the numbers of rows are higher than 0
if ($num > 0) {

    $posts_arr["data"] = array();

    //loop while 
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $post_item = array(
            'priority_level' => $priority_level,
            'priority' => $priority,
            'id_job' => $id_job,
            'id_client' => $id_client,
            'id_job_processor' => $id_job_processor,
            'title' => $title,
            'description' => $description,
            'last_date' => $last_date
        );

        // push to "data" array
        array_push($posts_arr["data"], $post_item);
    }

    // Turn to Json 
    echo json_encode($posts_arr);
} else {

    echo json_encode(
        array('message' => 'No Jobs Found')
    );
}
