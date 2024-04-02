<?php
// var_dump($_POST);
require_once("../Repositories/TaskRepository.php");
require_once("../Database/DatabaseConnection.php");

$color         =    $_GET['color'] ?? 0;
$borderColor   =    $_GET['borderColor'] ?? 0;
$task_id       =    $_GET['id'] ?? 0;

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());

$task = $taskRepo->ChgPriorColor($color,$borderColor,$task_id);
if($task!=null){
    echo json_encode(["code"=>1, "message"=>"success"]);
}else{
    echo json_encode(["code"=>-1, "message"=>"failed"]);
}
?>