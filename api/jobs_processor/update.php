<?php 


//Headers 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs
include_once "../../models/jobs_processors.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the model object
$processor = new JobProcessor($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

//set id
$processor->id_processor = $data->id_processor;
//set data with job processor object model
$processor->id_job_processor = $data->id_job_processor;
$processor->priority_level = $data->priority_level;
$processor->priority = $data->priority;

//call method
if($processor->update()){
    echo json_encode(array(
        "message" => "Job Processor was updated successfully"
    ));
}else{
    echo json_encode(array(
        "message" => "Somethig went wrong! try this Again!"
    ));
}