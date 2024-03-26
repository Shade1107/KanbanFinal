<?php
    //require section
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $projectmemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $result = $projectmemberRepo->delete($_GET['id']);
    if($result){
        header("Location: project_members.php");
    }
?>