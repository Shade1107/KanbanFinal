<?php
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/TaskHistoryRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Database/DatabaseConnection.php');

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());
$history = new TaskHistoryRepository(DatabaseConnection::getInstance());

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['task_id'], $_POST['project_id'], $_POST['details'], $_POST['user_id'], $_POST['stage_id'])) {
        $task_id = $_POST['task_id'];
        $project_id = $_POST['project_id'];
        $details = $_POST['details'];
        $user_id = $_POST['user_id'];
        $stage_id = $_POST['stage_id']; // Fetching stage_id from the POST data

        // Fetch old task and its stage
        $oldTask = $taskRepo->find($task_id);
        $oldStage = $oldTask->stage_id;

        // Construct details for task history
        $details = "Changed task from stage $oldStage to stage $stage_id";

        // Update the stage of the task
        $oldTask->stage_id = $stage_id;
        $updateStageResult = $taskRepo->updateStage($task_id, $stage_id);

        if ($updateStageResult) {
            // Create the task history entry
            $result = $history->create($task_id, $project_id, $details, $user_id, $stage_id);

            if ($result) {
                echo "success";
            } else {
                echo "Failed to create task history";
            }
        } else {
            echo "Failed to update task stage";
        }
    } else {
        echo "One or more required fields are missing.";
    }
} else {
    echo "Invalid request method";
}