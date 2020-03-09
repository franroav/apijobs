<?php 

//Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../models/conexion.php";
include_once "../../models/jobs.php";

// Instantiate DB & connect 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the object model 
$jobs = new Jobs($db);

//get the id ternary condition 
$jobs->id_job = isset($_GET['id_job']) ? $_GET['id_job'] : die();

//call the method 
$jobs->read_only();

//Create Array
$post_arr["data"] = array(
    'priority_level' => $jobs->priority_level,
    'priority' => $jobs->priority,
    'id_job' => $jobs->id_job,
    'id_client' => $jobs->id_client,
    'id_job_processor' => $jobs->id_job_processor,
    'title' => $jobs->title,
    'description' => $jobs->description,
    'last_date' => $jobs->last_date
);

//make json 
print_r(json_encode($post_arr));