<?php
    //require section
    require_once("../Repositories/TaskRepository.php");
    require_once("../Repositories/Task_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php

    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());
    $taskMemberRepo = new TaskMemberRepository(DatabaseConnection::getInstance());

    if (isset($_POST['project_id']) && isset($_POST['short_description']) && isset($_POST['task_name']) && isset($_POST['user_id'])) {
    $project_id         = $_POST['project_id'];
    $short_description  = $_POST['short_description'];
    $task_name          = $_POST['task_name'];
    $user_id            = $_POST['user_id'];

    $result = $taskRepo->create($project_id, $short_description, $task_name, $user_id);
    if ($result) {
        return true;
        // 
        echo "success";
    } else {
        echo "Error inserting project.";
    }
} else {
    echo "One or more required fields are missing.";
}

    //  $taskMemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());

    // $task_id     = $_POST['task_id'];
    // $user_id     = $_POST['user_id'];

    // $result = $taskMemberRepo->create($user_id, $task_id);
    // if($result){
    //     header("Location: task_members.php");
    // }

?>