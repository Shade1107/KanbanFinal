<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
    $result = $projectRepo->delete($_GET['id']);
    if($result){
        header("Location: projects.php");
    }
?>