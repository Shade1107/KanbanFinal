<?php
require_once('../header_footer/header.php');
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/Task_memberRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Database/DatabaseConnection.php');

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());
$taskMemberRepo = new TaskMemberRepository();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['project_id']) &&
        isset($_POST['short_description']) &&
        isset($_POST['task_name']) &&
        isset($_POST['user_id'])
    ) {
        $project_id = $_POST['project_id'];
        $short_description = $_POST['short_description'];
        $task_name = $_POST['task_name'];
        $user_ids = $_POST['user_id'];

        // Create the task
        $result = $taskRepo->create($project_id, $short_description, $task_name, $user_ids);
        if ($result) {
            header('Location: ../pages/HomeAdmin.php');
            exit;
        } else {
            echo "Error inserting task.";
        }
    } else {
        echo "One or more required fields are missing.";
    }
}
?>