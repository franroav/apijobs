<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//model conexion
include_once "../../models/conexion.php";
//model jobs
include_once "../../models/jobs.php";

//instantiate database 
$database = new Conexion();
//sabe db variable for the constructor object model 
$db = $database->conectar();

//call to object model
$jobs = new Jobs($db);

//Get the raw posted data // conseguir la data que viene por post
$data = json_decode(file_get_contents("php://input"));

//set data with job object model
$jobs->id_client = $data->id_client;
$jobs->id_job_processor = $data->id_job_processor;
$jobs->title = $data->title;
$jobs->description = $data->description;
$jobs->last_date = $data->last_date;

//call method
if($jobs->create()){

        //call method read
        $read = $jobs->read();
        //fetch all data
        $result = $read->fetchALL(PDO::FETCH_ASSOC);
        //counts all rows
        $numItems = count($result);
        //counter
        $i = 0;

        //loop data 
        foreach ($result as $key => $value) {
            //validation 
            if(++$i === 1) {
                echo json_encode(array(
                    "message" => "Job created Successfully! find your job in http://localhost/apijobs/api/jobs/read_only.php?id_job=" . $value["id_job"]
                ));
              }
        }

}else{
    echo json_encode(array(
        "message" => "Job Not created! Try again!"
    ));
}
