<?php
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/Task_memberRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Database/DatabaseConnection.php');

$taskRepo = new TaskRepository(DatabaseConnection::getInstance());
$history = new TaskHistoryRepository(DatabaseConnection::getInstance());

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['task_id'], $_POST['project_id'], $_POST['details'], $_POST['user_id'])) {
        $task_id = $_POST['task_id'];
        $project_id = $_POST['project_id'];
        $details = $_POST['details'];
        $user_id = $_POST['user_id'];         
        
        // Fetch old task and its stage
        $oldTask = $taskRepo->find($task_id);
        $oldStage = $oldTask->stage_id;
        
        // Construct details for task history
        $currentStage = $stage_id; // Assuming $stage_id holds the current stage ID
        $details = "Changed task from stage $oldStage to stage $currentStage";
        
        // Create the task history entry
        $result = $history->create($task_id, $project_id, $details, $user_id);
        
        if ($result) {
            echo "success";
        } else {
            echo "Failed to create task history";
        }
    } else {
        echo "One or more required fields are missing.";
    }
} else {
    echo "Invalid request method";
}
?>
