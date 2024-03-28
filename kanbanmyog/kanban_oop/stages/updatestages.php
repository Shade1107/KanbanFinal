<?php
    //require section
    require_once("../Repositories/StageRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $stageRepo = new StageRepository(DatabaseConnection::getInstance());

    $id     = $_POST['id'];
    $name   = $_POST['name'];

    $result = $stageRepo->update($id, $name);
    if($result){
        header("Location: stages.php");
    }
?>