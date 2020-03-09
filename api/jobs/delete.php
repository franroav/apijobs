<?php 

//Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs
include_once "../../models/jobs.php";

// Instantiate DB & connect 
$database = new Conexion();

//sabe db variable for the constructor object model 
$db = $database->conectar();

//Instantiate the object model
$jobs = new Jobs($db);

//Get the raw posted data 
$data = json_decode(file_get_contents("php://input"));

//set Id
$jobs->id_job = $data->id_job;

//call the method if will return true if everything is fine 
if($jobs->delete()){
    echo json_encode(array(
        'message' => 'The job has been Erase successfully!'
    ));
}else{
    echo json_encode(array(
        'message' => 'Something went wrong! Try this again!'
    ));
}