<?php 

//Headers 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs
include_once "../../models/jobs.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the model object
$jobs = new Jobs($db);

//Get the raw posted data 
$data = json_decode(file_get_contents("php://input"));

//set id
$jobs->id_job = $data->id_job;
//set data with job processor object model
$jobs->id_client = $data->id_client;
$jobs->id_job_processor = $data->id_job_processor;
$jobs->title = $data->title;
$jobs->description = $data->description;
$jobs->last_date = $data->last_date;

//call method
if($jobs->update()){
    echo json_encode(array(
        'message' => 'Jobs has been updated Successfully!'
    ));
}else{
    echo json_encode(array(
        'message' => 'Something went wrong! Try again!'
    ));
}