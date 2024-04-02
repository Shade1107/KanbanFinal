<?php
    require_once("../Database/DatabaseConnection.php");
    require_once("../Repositories/StageRepository.php");
    require_once("../Repositories/TaskRepository.php");

    //update....
    $task_id = $_GET['task_id'] ?? 0 ;//need to vlidate more deeply
    $stage_id = $_GET['stage_id'] ?? 0 ;//need to vlidate more deeply

    $taskRepo = new TaskRepository();
    $stageRepo = new StageRepository();
    $task = $taskRepo->find("id", $task_id);
    $stagee = $stageRepo->find("id", $stage_id);

    
    //need to check $task and $stage..
    $task = $taskRepo->assignStage($task, $stage); 
    if($task!=null){
        echo json_encode(["code"=>1, "message"=>"success"]);
    }else{
        echo json_encode(["code"=>-1, "message"=>"failed"]);
    }
?>