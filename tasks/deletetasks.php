<?php
    //require section
    require_once("../Repositories/TaskRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());
    $result = $taskRepo->delete($_GET['id']);
    if($result){
        header("Location: tasks.php");
    }
?>