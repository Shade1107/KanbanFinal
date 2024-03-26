<?php
    //require section
    require_once("../Repositories/Task_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $taskMemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());

    $task_id     = $_POST['task_id'];
    $user_id     = $_POST['user_id'];

    $result = $taskMemberRepo->create($user_id, $task_id);
    if($result){
        header("Location: task_members.php");
    }
?>