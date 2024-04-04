<?php 
require_once('../header_footer/header.php');
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Functions4Kanban/taskcreate.php');

?>
<!Doctype html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/Mistyle.css" /> -->
    <!-- title logo  -->
    <link rel="icon" type="../image/png" href="../image/logo2_2.PNG">

 </head>  
 <body class="YHomeBodyColor">
 <section class="Ycolumn-container MiYcolumn-container pb-5">
  <div class="row">
  <!-- picture -->
 <div class="col-lg-7  d-flex justify-content-center align-items-center">
  <div class="imgspace"></div>

 </div>

 <!-- add  task -->
 <div class="col-lg-5">


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <div class="text"><h1 class="loginFormText mt-5 ">⟁ Add Task</h1>

            <div>
            <?php if(isset($error_message)) { ?>
                      <div style="color: red;"><?php echo $error_message; ?></div>
                      <?php
                       } ?>
            </div>
            
          </div>
          <?php
                require_once('../Repositories/ProjectRepository.php');

                if (isset($_GET["id"])) {
                    $id = intval($_GET["id"]);
                    $prorepo = new ProjectRepository(DatabaseConnection::getInstance());
                    $project = $prorepo->find($id);
                    if (isset($project)) {
                ?>
                        <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
                <?php
                    } else {
                        echo "<p>Not found.</p>";
                    }
                }
                ?>
              <!-- task name -->
            <div class="Yinput-container text-center">

            <input type="text" id="" class="Miinput-field mt-5" placeholder="Enter task title" name="task_name"><br>
            
          

           <!-- add member -->
          <div class="addmember"> 
            <?php
              // Get the task members from the repository
              $pjMemberRepository = new projectMemberRepository();
              $taskMembers = $pjMemberRepository->findWithProjectID($id);
            ?>
            
            <select id="tselect" class="select" placeholder="search member to add" name="user_id[]" multiple>
                      <?php foreach ($taskMembers as $taskMember) {
        // Get the user name for each task member
        $userName = taskMemberRepository::getUserName($taskMember);
        ?>
         <option value="<?php echo $taskMember->user_id; ?>">
            <?php echo $userName->name; ?>
        </option>
    <?php } ?>
    </select>      
             </div>

           <!-- discription -->
            <textarea placeholder="detail description..." class="Mitext_area mt-4" name="short_description" ></textarea>
                  <!-- Priorty color -->
               <div class="Micolorcontainer mt-2">
                <div class="Micolortext">
                Choose your Priorty color :
                </div>  

               <div class="d-flex">
                        <div class="canvas-containerMi ">

                          <canvas id="canvas1" width="25" height="25" class="MiYcanvas MiYcanvas1" data-priority="1" data-toggle="tooltip" data-placement="top" data-bs-original-title="1st priority"></canvas>
                          <canvas id="canvas1" width="25" height="25" class="MiYcanvas MiYcanvas2" data-priority="2" data-toggle="tooltip" data-placement="top" data-bs-original-title="2nd priority"></canvas>
                          <canvas id="canvas1" width="25" height="25" class="MiYcanvas MiYcanvas3" data-priority="3" data-toggle="tooltip" data-placement="top" data-bs-original-title="3rd priority"></canvas>

                        </div>
                        </div>
                        </div>
                        </div>
                        <Br>
             
                  <div class="buttontask-container py-5">
                  <a href="../home_admin.php" class="buttonlink"><button type="button" class="buttonMi " >Back</button></a>
                  <button type="submit" class="buttonMi " >Create</button>

                  </div>

           </form>
                </div>
 </div> 
</section>



              <?php
              require_once('../header_footer/footer.php');
                 ?>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script> 
<script src="../js/foraddtask.js"></script>

  </body>

</html>