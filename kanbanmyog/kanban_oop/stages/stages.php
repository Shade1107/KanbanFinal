<?php
    //require section
    require_once("../Repositories/StageRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $stageRepo = new StageRepository(DatabaseConnection::getInstance());
    $stages = $stageRepo->getAll();
?>
<html>
    <head>
        <title>Stages</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>Stage Name</th>
                <th>Project Name</th>
            </tr>
        <?php foreach($stages as $u): ?>
            <tr>
                <td><?=$u->id?></td>
                <td><?=$u->name?></td>
                <td><?=$u->getProject()->name?></td>
                <td>
                    <a href="deletestages.php?id=<?=$u->id?>">
                        <button>Delete</button>
                    </a>
                    <a href="updatestagespage.php?id=<?=$u->id?>">
                        <button>Update</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </body>
</html>
