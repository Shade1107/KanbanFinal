<?php
    //require section
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $projectMemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $projectMembers = $projectMemberRepo->getAll();
?>
<html>
    <head>
        <title>Projects</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Project Name</th>
            </tr>
        <?php foreach($projectMembers as $u): ?>
            <tr>
                <td><?=$u->id?></td>
                <td><?=$u->getUser()->name?></td>
                <td><?=$u->getProject()->name?></td>
                <td>
                    <a href="deleteproject_members.php?id=<?=$u->id?>">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </body>
</html>
