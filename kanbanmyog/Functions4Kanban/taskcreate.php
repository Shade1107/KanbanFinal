<?php
// require_once('../header_footer/header.php');
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/Task_memberRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Database/DatabaseConnection.php');

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['project_id']) &&
        isset($_POST['short_description']) &&
        isset($_POST['task_name']) &&
        isset($_POST['user_id'])&&
        isset($_POST['task_priority_color'])&&
        isset($_POST['task_priority_border'])
    ) {
        $project_id = $_POST['project_id'];
        $short_description = $_POST['short_description'];
        $task_name = $_POST['task_name'];
        $user_ids = $_POST['user_id'];
        $priority_color = $_POST['task_priority_color'];
        $priority_border = $_POST['task_priority_border'];
       
        if (empty($task_name)) {
            $error_message = "Task name is required.";
        } else {
            // Create the task
            $result = $taskRepo->create($project_id, $short_description, $task_name, $user_ids,$priority_color,$priority_border);
            if ($result) {
                header('Location: ../home_admin.php?id=' . $project_id); 
                exit;
            } else {
                $error_message = "Error inserting task.";
            }
        }
    } else {
        $error_message = "One or more required fields are missing.";
    }
}
?>