<?php
// var_dump($_POST);
require_once("../Repositories/TaskRepository.php");
require_once("../Database/DatabaseConnection.php");

$task = new TaskRepository(DatabaseConnection::getInstance());

if (isset($_POST['color']) && isset($_POST['borderColor']) && isset($_POST['task_id'])) {
    $color = $_POST['color'];
    $borderColor = $_POST['borderColor'];
    $task_id = $_POST['id'];
    // Update the color and border color of the task in your database
    $query = "UPDATE tasks SET task_priority_color =?, task_priority_border =? WHERE id =?";
    $stmt = $task->$connection->prepare($query);
    $stmt->bind_param("ssi", $color, $borderColor, $task_id);
    $stmt->execute();
}
?>