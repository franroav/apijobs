<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once "../../models/conexion.php";
require_once "../../models/clients.php";

//instantiate database
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//instantiate the object model 
$clients = new Clients($db);

//get the id ternary condition 
$clients->id_client = isset($_GET['id_client']) ? $_GET['id_client'] : die();

//call the method 
$clients->read_only();


//create array 
$client_arr["data"] = array(
    "id_client" => $clients->id_client,
    "name" => $clients->name,
    "lastname" => $clients->lastname,
    "phone" => $clients->phone,
    "mail" => $clients->mail
);

print_r(json_encode($client_arr));

