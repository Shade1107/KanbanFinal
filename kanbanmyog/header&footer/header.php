<?php 
$isMember = $isMember??'';
$isAdmin = $isAdmin??'';
// echo $isAdmin;
// echo "<hr>";

$isAdminMemberFromPJwebpage = $isAdminMemberFromPJwebpage??'';
// echo $isAdminMemberFromPJwebpage;

$isCreateTask = $isCreateTask?? '';
$isCreateProject = $isCreateProject??'';

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
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">    
  


  <!-- custom css  -->


      <!-- <link rel="stylesheet" href="css/style.css" /> -->
     
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="info-container">
        <h1>
          <?php if($isMember || $isAdmin){?>
              <img src="image/logo2.png" width="120px" height="50px">
          <?php }else{?> 

          <img src="../image/logo2.png" width="120px" height="50px">
          
          <?php } ?>
          
          <!-- <span class="YspanBoard"></span></h1> -->
        <p class="mt-3">
           Organise tasks  as well as add new ones and
          delete old ones.
        </p>
      </div>
      <div class="d-flex profile">
        <?php 
          if ($isAdmin) { ?>
             <a href="pages/createtask.php" class="btn  mt-3 ">Add Task</a>
            <?php } ?>
          
            <?php
             if((!$isAdminMemberFromPJwebpage) && (!$isCreateProject)){?>
              <a href="#" class="btn  mt-3 ">Member List</a>
              <a href="#" class="btn  mt-3 ">LogOut</a>
              <?php }else{?> 
                <a href="#" class="btn  mt-3 ">LogOut</a>
              
              <?php } ?>
         
          
          <div class="d-flex Profilecircle mr-3">
                <a href="#" class="circle-container">

                <?php 
                    if ($isAdminMemberFromPJwebpage || $isCreateTask ||$isCreateProject) { ?>
                     <img src="../image/p2.jpg">
                    <?php }else {?> 

                    <img src="image/p2.jpg">

                    <?php } ?>
                </a>
                
                
          </div>
          <!-- <i class="fa-solid fa-bars"></i> -->
      </div>
    </header>

     <!--bootstrap css1 js 1-->
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>