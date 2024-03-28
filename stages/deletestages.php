<?php
    //require section
    require_once("../Repositories/StageRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $stageRepo = new StageRepository(DatabaseConnection::getInstance());
    $result = $stageRepo->delete($_GET['id']);
    if($result){
        header("Location: stages.php");
    }
?>