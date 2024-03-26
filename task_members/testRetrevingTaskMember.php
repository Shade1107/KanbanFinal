<?php
    //require section
    require_once("../Repositories/Task_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $taskMemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());
    $taskMembersId = $taskMemberRepo->findWithMemberID(2);
?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
    <?php foreach($taskMembersId as $u): ?>
        <tr>
            <td><?=$u->id?></td>
            <td><?=$u->user_id?></td>
            <td><?=$u->task_id?></td>
        </tr>
    <?php endforeach;?>
</table>
    </hr>
<?php
    $taskMembersProjectId = $taskMemberRepo->findWithTaskID(2);
?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
    <?php foreach($taskMembersProjectId as $p): ?>
        <tr>
            <td><?=$p->id?></td>
            <td><?=$p->user_id?></td>
            <td><?=$p->task_id?></td>
        </tr>
    <?php endforeach;?>
</table>