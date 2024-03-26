<?php
    //require section
    require_once("../Repositories/TaskRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());

    $id                 = $_POST['id'];
    $project_id         = $_POST['project_id'];
    $stage_id           = $_POST['stage_id'];
    $short_description  = $_POST['short_description'];
    $task_name          = $_POST['task_name'];

    $result = $taskRepo->update($id, $project_id, $stage_id, $short_description, $task_name);
    if($result){
        header("Location: tasks.php");
    }
?>