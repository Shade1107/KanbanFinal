<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());

    $admin_id       = $_POST['admin_id'];
    $name           = $_POST['name'];
    $description    = $_POST['description'];
    $detail_descrip = $_POST['detail_descrip'];
    $create_date    = $_POST['create_date'];
    $due_date       = $_POST['due_date'];
    $completed_date = $_POST['completed_date'];
    $user_id        = $_POST['user_id'];

    $result = $projectRepo->create($admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $completed_date, $user_id);
    if($result){
        header("Location: projects.php");
    }
?>