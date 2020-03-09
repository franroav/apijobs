<?php

//Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model clients
include_once "../../models/clients.php";

//database conexion 
$database = new Conexion();

//sabe db variable for the constructor object model 
$db = $database->conectar();

//Instantiate the object model
$clients = new Clients($db);

//Get the raw posted data whit decoding string retured from file_get_content method  // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

//set id
$clients->id_client = $data->id_client;


//If isset true echo out, or if isset false echo error out.
if($clients->delete()){
    echo json_encode(array(
        "message"=>"The user has been deleted succesfully!"
    ));
}else{
    echo json_encode(array(
        "message"=>"Something went wrong! try it again!"
    ));
}

