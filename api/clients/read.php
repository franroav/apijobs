<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//model conexion
require_once "../../models/conexion.php";
//model clients
require_once "../../models/clients.php";

//instantiate database
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//Instantiate the object model
$clients = new Clients($db);

//Instantiate the method read and return an array of client table
$result = $clients->read();

// count rows, method to count  rows of client 
$num = $result->rowCount();

if ($num > 0) {

    $client_arr["data"] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $client_item = array(
            "id_client" => $id_client,
            "name" => $name,
            "lastname" => $lastname,
            "phone" => $phone,
            "mail" => $mail
        );

        array_push($client_arr["data"], $client_item);
    }
    //return data
    echo json_encode($client_arr);
} else {

    echo json_encode(array(
        "message" => "Something went wrong! try this again!"
    ));
}
