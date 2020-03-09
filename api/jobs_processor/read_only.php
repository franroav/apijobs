<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include conexion
include_once "../../models/conexion.php";
//include Model
include_once "../../models/jobs_processors.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//call the object model job processor
$processor = new JobProcessor($db);

//get the id ternary condition 
$processor->id_processor = isset($_GET['id_processor']) ? $_GET['id_processor'] : die();

//call the method 
$processor->read_only();

//data
$processor_arr["data"] = array(
    "id_processor" => $processor->id_processor,
    "id_job_processor" => $processor->id_job_processor,
    "priority_level" => $processor->priority_level,
    "priority" => $processor->priority
);
//return response
print_r(json_encode($processor_arr));




