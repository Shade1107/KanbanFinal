<?php
    //require section
    require_once("../Repositories/StageRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $stageRepo = new StageRepository(DatabaseConnection::getInstance());

    $name = $_POST['name'];
    $project_id = $_POST['project_id'];

    $result = $stageRepo->create($name, $project_id);
    if($result){
        header("Location: stages.php");
    }
?>