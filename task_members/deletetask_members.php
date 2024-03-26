<?php
    //require section
    require_once("../Repositories/Task_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $taskmemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());
    $result = $taskmemberRepo->delete($_GET['id']);
    if($result){
        header("Location: task_members.php");
    }
?>