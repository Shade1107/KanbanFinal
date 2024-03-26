<?php
    //require section
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $projectMemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());

    $project_id        = $_POST['project_id'];
    $user_id        = $_POST['user_id'];

    $result = $projectMemberRepo->create($user_id, $project_id);
    if($result){
        header("Location: project_members.php");
    }
?>