<?php
    require_once("../Database/DatabaseConnection.php");
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Repositories/StageRepository.php");
    require_once("../Repositories/TaskRepository.php");

    //update....
    $task_id = $_GET['task_id'] ?? 0 ;//need to vlidate more deeply
    $stage_id = $_GET['stage_id'] ?? 0 ;//need to vlidate more deeply
    $project_id = $_GET['project_id'] ?? 0 ;//need to vlidate more deeply

    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());
    $stageRepo = new StageRepository(DatabaseConnection::getInstance());

    $project   = $projectRepo->find($project_id);
    $task      = $taskRepo->find($task_id);
    $stage     = $stageRepo->find($stage_id);
    $LastStage = $stageRepo->findLastStageId($project_id);
    
    //need to check $task and $stage..
    if($stage->id != $LastStage){
        $task    = $taskRepo->assignStage($task, $stage); 
        $message = "";
        if($task!=null){
            echo json_encode(["code"=> 1, $message=>"success"]);
        }else{
            echo json_encode(["code"=>-1, $message=>"failed"]);
        }
    }else{
        $conn = DatabaseConnection::getInstance();
        $table = "tasks";
    
        $query = " 
            SELECT 
                CASE
                    WHEN COUNT(*) = SUM(CASE WHEN stage_id = ? THEN 1 ELSE 0 END)
                    THEN 'Yes'
                    ELSE 'No'
                END as is_last_stage_equal_to_total
            FROM `$table` ";
            
        $stmt = $conn->prepare($query);

            // Bind the parameter for the last stage
        $stmt->bindParam('?', $LastStage,PDO::PARAM_INT);

            // Execute the query
        $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch();

            // Check if the last stage is equal to total tasks
            if ($result['is_last_stage_equal_to_total'] == 'Yes') {
                // Redirect with a flag indicating that last stage is equal to total tasks
                header("Location: signup.php?laststageequaltotaltasks=true&project_id=$project_id");
                exit;
            } else {
                // Redirect with a flag indicating that last stage is not equal to total tasks
                header("Location: signup.php?laststageequaltotaltasks=false");
                $task    = $taskRepo->assignStage($task, $stage); 
                $message = "";
                if($task!=null){
                    echo json_encode(["code"=> 1, $message=>"success"]);
                }else{
                    echo json_encode(["code"=>-1, $message=>"failed"]);
                }
            }
    }
?>