<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());

    $id             = $_POST['id'];
    $admin_id       = $_POST['admin_id'];
    $name           = $_POST['name'];
    $description    = $_POST['description'];
    $detail_descrip = $_POST['detail_descrip'];
    $create_date    = $_POST['create_date'];
    $due_date       = $_POST['due_date'];
    $completed_date = $_POST['completed_date'];

    $result = $projectRepo->update($id, $admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $completed_date);
    if($result){
        header("Location: projects.php");
    }
?>