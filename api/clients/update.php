<?php 

//Headers 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs
include_once "../../models/clients.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the model object
$clients = new Clients($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

// set id
$clients->id_client = $data->id_client;
//set data with client object model
$clients->name = $data->name;
$clients->lastname = $data->lastname;
$clients->phone = $data->phone;
$clients->mail = $data->mail;

//execute method 
if($clients->update()){
    echo json_encode(array(
        "message" => "the user has been updated successfully"
    ));
}else{
    echo json_encode(array(
        "message" => "Something went wrong! try it Again!"
    ));
}
