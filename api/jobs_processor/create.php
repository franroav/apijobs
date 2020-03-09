<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs processors
include_once "../../models/jobs_processors.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//call to object model
$processor = new JobProcessor($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

//set data
$processor->id_job_processor = $data->id_job_processor;
$processor->priority_level = $data->priority_level;
$processor->priority = $data->priority;

//execute method
if($processor->create()){
    echo json_encode(array(
        "message"=>"job procesor added successfully"
    ));
}else{
    echo json_encode(array(
        "message"=>"Something went wrong"
    ));
}
