<?php 
require_once("../Repositories/UserRepository.php");
require_once("../Repositories/ProjectRepository.php");

$isMember = $isMember??'';
$isAdmin = $isAdmin??'';

$dbConnection = DatabaseConnection::getInstance();
$projectRepository = new ProjectRepository($dbConnection);
$projects = $projectRepository->getAll();

$id = intval($_GET["id"]?? '2');
$projects = $projectRepository->find($id);

?>  
<?php

session_start(); 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  $userID = $_SESSION['user_id'];
  $userRepo = new UserRepository(DatabaseConnection::getInstance());
  $user = $userRepo->find($userID);
}
$isAdminMemberFromPJwebpage = $isAdminMemberFromPJwebpage??'';

// to check nav-link and photo  for each page
$isCreateTask = $isCreateTask?? '';
$isCreateProject = $isCreateProject??'';
$isDetailTaskMember = $isDetailTaskMember ?? '';
$isDetailTaskAdmin = $isDetailTaskAdmin ?? '';
$isProfile = $isProfile ?? '';
$isMemberListAdmin = $isMemberListAdmin ?? '';
$isMemberListMember = $isMemberListMember??'';


// Find the user with the specified ID
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kanban Board</title>
    <!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  </head>
  <body>
    <header>
      <div class="info-container">
        <h1>⟁ Kanban <span class="YspanBoard">Board</span></h1>
        <p>
           Organise tasks  as well as add new ones and
          delete old ones.
        </p>
      </div>
      <div class="d-flex profile">
        <?php 
          if ($isAdmin) :?>
             <a href="pages/createtask.php?id=<?= isset($projects->id) ? $projects->id : ''; ?>" class="btn  mt-3">Add Task</a>
            <?php endif ?>
            <a href="<?= ($isAdmin ? '../pages/memberlist_admin.php' : (isset($user) && $user->role_id == 2 ? '../pages/memberlist_member.php' : '../pages/memberlist_admin.php')) ?>" class="btn mt-3">Member List</a>
          <a href="../Functions4Kanban/signout.php" class="btn  mt-3 ">LogOut</a>
          <div class="d-flex Profilecircle mr-3">
                <a href="viewprofile.php?id=<?= $userID ?>" class="circle-container">
                <?php
               $imagePath = (isset($user->img) && !empty($user->img)) ? "../image/".$user->img : "../image/default.jpg";
                ?>
                <img src="<?= $imagePath ?>" id="photoPreview" class="avatar img-circle img-thumbnail" alt="avatar">

                </a>
                
          </div>
      </div>
    </header>

     <!--bootstrap css1 js 1-->
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>