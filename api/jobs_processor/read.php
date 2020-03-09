<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include conexion
include_once "../../models/conexion.php";
//include Model
include_once "../../models/jobs_processors.php";

//database conexion 
$database = new Conexion();

//sabe db variable for the constructor object model 
$db = $database->conectar();

//Job Processor object model array
$processor = new JobProcessor($db);

//save the array result
$read = $processor->read();

$result = $read->fetchALL(PDO::FETCH_ASSOC);

$proccessor_arr["data"] = array();

    foreach($result as $key => $value){

        $processor_item = array(
            "id_processor" => $value["id_processor"],
            "id_job_processor" => $value["id_job_processor"],
            "priority_level" => $value["priority_level"],
            "priority" => $value["priority"]
        );
        //array push 
        array_push($proccessor_arr["data"], $processor_item);
    
    }
//turn to json 
echo json_encode($proccessor_arr);







