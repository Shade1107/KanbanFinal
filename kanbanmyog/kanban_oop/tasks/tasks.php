<?php
    //require section
    require_once("../Database/DatabaseConnection.php");
    require_once("../Repositories/StageRepository.php");
    require_once("../Repositories/TaskRepository.php");
?>

<?php
    $taskRepo = new TaskRepository(DatabaseConnection::getInstance());
    $tasks = $taskRepo->getAll();
?>
<html>
    <head>
        <title>Tasks</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>Stage</th>
                <th>Short Description</th>
                <th>Task Name</th>
               
            </tr>
        <?php foreach($tasks as $t): ?>
            <tr>
                <td><?=$t->id?></td>
                <td><?=$t->getPjName()->name?></td>
                <td><?=$t->getStage()->name?></td>
                <td><?=$t->short_description?></td>
                <td><?=$t->task_name?></td>
                <td>
                    <a href="deletetasks.php?id=<?=$t->id?>">
                        <button>Delete</button>
                    </a>
                    <a href="updatetaskspage.php?id=<?=$t->id?>">
                        <button>update</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </body>
</html>
