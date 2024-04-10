<?php 
require_once('../header_footer/header.php');
require_once('../Database/DatabaseConnection.php');
require_once('../Repositories/Task_historyRepository.php');

$histories = []; // Initialize $histories as an empty array

$historyRepo = new TaskHistoryRepository(DatabaseConnection::getInstance());    

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['task_id'], $_POST['project_id'], $_POST['details'], $_POST['user_id'], $_POST['stage_id'])) {
        $task_id = $_POST['task_id'];
        $project_id = $_POST['project_id'];
        $details = $_POST['details'];
        $user_id = $_POST['user_id'];
        $stage_id = $_POST['stage_id'];

        // Fetch filtered task histories using the custom method
        $histories = $historyRepo->getFilteredHistories($task_id, $project_id, $details, $user_id, $stage_id);
         
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo.PNG">
    <title>Memberlist</title>
</head>
<body>

<section class="column-container container" id="container">


    <div class="task-column item" draggable="true" id="backlog" style="width:100%">
        <h3>✔ Task history ✔</h3>
        <hr class="custom-hr" />
            <table class="table table-striped" >        
            <thead class="table-danger">
                    <tr class="h6">
                    <th>ID</th>
                    <th>Task_ID</th>
                    <th>Project_ID</th>
                    <th>Stage_ID</th>
                    <th>Details</th>
                    <th>User_ID</th>
                    <th>Change State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($histories as $history) : ?>
                    <tr>
                        <td><?= $history->id ?></td>
                        <td><?= $history->task_id ?></td>
                        <td><?= $history->project_id ?></td>
                        <td><?= $history->stage_id ?></td>
                        <td><?= $history->details ?></td>
                        <td><?= $history->user_id ?></td>
                        <td><?= $history->created_at ?></td> 
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="col-md-6">
            <a href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#79305a" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg></a>
        </div>
        <br>
    </div>
</section>
</body>
</html>
