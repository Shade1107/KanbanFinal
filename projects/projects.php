<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
    $projects = $projectRepo->getAll();
?>
<html>
    <head>
        <title>Projects</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>Admin</th>
                <th>Name</th>
                <th>Description</th>
                <th>Detail</th>
                <th>Create date</th>
                <th>Due date</th>
                <th>Complete date</th>
            </tr>
        <?php foreach($projects as $u): ?>
            <tr>
                <td><?=$u->id?></td>
                <td><?=$u->getName()->name?></td>
                <td><?=$u->name?></td>
                <td><?=$u->description?></td>
                <td><?=$u->detail_descrip?></td>
                <td><?=$u->create_date?></td>
                <td><?=$u->due_date?></td>
                <td><?=$u->completed_date?></td>
                <td>
                    <a href="deleteprojects.php?id=<?=$u->id?>">
                        <button>Delete</button>
                    </a>
                    <a href="updateprojectspage.php?id=<?=$u->id?>">
                        <button>update</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </body>
</html>
