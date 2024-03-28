<?php
    //require section
    require_once("../Repositories/TaskRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());

    $project_id         = $_POST['project_id'];
    $short_description  = $_POST['short_description'];
    $task_name          = $_POST['task_name'];
    $user_id            = $_POST['user_id'];

    $result = $taskRepo->create($project_id, $short_description, $task_name, $user_id);
    if($result){
        header("Location: tasks.php");
    }
?>