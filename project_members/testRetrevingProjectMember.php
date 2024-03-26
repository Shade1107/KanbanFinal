<?php
    //require section
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $projectMemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $projectMembersId = $projectMemberRepo->findWithMemberID(2);
?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
    <?php foreach($projectMembersId as $u): ?>
        <tr>
            <td><?=$u->id?></td>
            <td><?=$u->user_id?></td>
            <td><?=$u->project_id?></td>
        </tr>
    <?php endforeach;?>
</table>
    </hr>
<?php
    $projectMemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $projectMembersProjectId = $projectMemberRepo->findWithProjectID(2);
?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
    <?php foreach($projectMembersProjectId as $p): ?>
        <tr>
            <td><?=$p->id?></td>
            <td><?=$p->user_id?></td>
            <td><?=$p->project_id?></td>
        </tr>
    <?php endforeach;?>
</table>