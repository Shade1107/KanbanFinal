<?php
    //require section
    require_once("../Repositories/Task_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $taskMemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());
    $taskMembers = $taskMemberRepo->getAll();
?>
<html>
    <head>
        <title>Task Members</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Task Name</th>
            </tr>
        <?php foreach($taskMembers as $u): ?>
            <tr>
                <td><?=$u->id?></td>
                <td><?=$u->getUser()->name?></td>
                <td><?=$u->getTask()->task_name?></td>
                <td>
                    <a href="deletetask_members.php?id=<?=$u->id?>">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </body>
</html>
