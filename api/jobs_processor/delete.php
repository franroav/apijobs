<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs processor
include_once "../../models/jobs_processors.php";

//instantiate database
$database = new Conexion();

//sabe db variable for the constructor object model 
$db = $database->conectar();

//Instantiate the object model
$processor = new JobProcessor($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

//set id
$processor->id_processor = $data->id_processor;

//call the method if will return true if everything is fine 
if($processor->delete()){
    echo json_encode(array(
        "message"=> "The job procesor was Deleted Succesfully!"
    ));
}else{
    echo json_encode(array(
        "message"=> "Something went wrong!, try this Again!"
    ));
}

