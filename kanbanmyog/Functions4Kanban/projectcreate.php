<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $admin_id = DatabaseConnection::getInstance()->real_escape_string($_POST['admin_id']);
        $name = DatabaseConnection::getInstance()->real_escape_string($_POST["projectName"]);
        $users_id = $_POST["members"];
        $description = DatabaseConnection::getInstance()->real_escape_string($_POST["Description"]);
        $detail_descrip = DatabaseConnection::getInstance()->real_escape_string($_POST["Detail_Description"]);
        $create_date = DatabaseConnection::getInstance()->real_escape_string($_POST["createDate"]);
        $due_date = DatabaseConnection::getInstance()->real_escape_string($_POST["dueDate"]);
        
        $result = $projectRepo->create($admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $users_id);
        if ($result) {
          header("Location: ../pages/addProjectAdmin.php");
          exit();
        } else {
            $error_message = "Error inserting task.";
        } 
    }
    else{
        $error_message = "One or more required fields are missing.";
    }
?>