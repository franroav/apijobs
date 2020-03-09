<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model clients
include_once "../../models/clients.php";

//instantiate the database
$database = new Conexion();

//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the model object
$clients = new Clients($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));


//set data with client object model
$clients->name = $data->name;
$clients->lastname = $data->lastname;
$clients->phone = $data->phone;


//Email Validation 
$read = $clients->read();

$result = $read->fetchALL(PDO::FETCH_ASSOC);

foreach ($result as $key => $value) {

    if ($data->mail != $value["mail"]) {

        $clients->mail = $data->mail;
    }else{
        echo json_encode(array(
            "message" => "Your email is already store!"
        ));
        die();
    }
}

//call method

if ($clients->create()) {
    echo json_encode(array(
        "message" => "the user has been created successfully"
    ));
} else {
    echo json_encode(array(
        "message" => "Something went wrong! try it Again!"
    ));
}