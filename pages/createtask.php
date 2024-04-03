<?php 
require_once('../header_footer/header.php');
require_once('../Repositories/TaskRepository.php');
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/Project_memberRepository.php');
require_once('../Functions4Kanban/taskcreate.php');

?>
<!Doctype html>
<head>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo.PNG">

<style>
  .select{
  width: 400px;
  }

  .p-4 {
    padding: 0px !important;
  }

  .buttonMi{
    text-align: center;
     /* display: block; */
    margin-left: 60px;
    font-size: 15px;
    background: #3e306b;
    height: 40px;
    width: 100px;
    color: #c4aef4;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: 1px solid #3e306b;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
    font-size: 12px;
   }

  .des{
    width: 300px;
    height: 180px; 
    display: inline;
  }

  .Detail_des{
    width: 300px;
    height: 180px;
  }


</style>

 </head>  
 <body class="YHomeBodyColor">
    <div class="container-fluid row">
      <div class="col-lg-7 YloginImg ee92a9">
      <!-- image -->
      </div>

      <!-- form -->
      <div class="Miprojectform  col-lg-6 ee92a9 mt-5">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

      <!-- error message -->
      <?php if(isset($error_message)) { ?>
                      <div style="color: red;"><?php echo $error_message; ?></div>
                      <?php
                       } ?>

          <h1 class="loginFormText">⟁ Add Task</h1>
         

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
          <div class="Yinputfieldcenter">
            <div class="mt-5 Miinput">   
              <input type="text" id="" class="Miinput-field mt-3-" placeholder="Task Name" name="task_name"><br>
              <!-- add member -->
              <div class="addmember">  
                <table class="searchtable">
                <?php
            
            // $userRepo = new projectMemberRepository(DatabaseConnection::getInstance());
            // $member = $userRepo->getAll();
            ?>
                  <tr>
                    <td><i class="fa-solid fa-magnifying-glass searchicon"></i></td>
         
                    <td>
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
                  </td>
                  </tr>
                </table>
                  </div>
            
            <!-- discription -->
            <textarea placeholder="detail description..." class="Mitext_area mt-4" name="short_description" ></textarea>

             <!-- create date -->
             


                 <!-- Priorty color -->
              <div class="Micolorcontainer mt-4">
               <div class="Micolortext">
               Choose your Priorty color :
               </div>  

              <div class="d-flex">
                       <div class="canvas-containerMi ">
                         <div class="candivMi" id="cand1"><span>1st </span>
                             <canvas id="canvas1" width="40" height="40" class="canvas " data-color="#d16bca" data-cand="cand1"></canvas>
                         </div> 
                         <div class="candivMi" id="cand2"><span>2nd </span>
                             <canvas id="canvas2" width="40" height="40" class="canvas " data-color="#795ce0" data-cand="cand2"></canvas>
                         </div>
                         <div class="candivMi" id="cand3"><span>3rd </span>
                             <canvas id="canvas3" width="40" height="40  " class="canvas " data-color="#30d1d9" data-cand="cand3"></canvas>
                         </div>

                       </div>
                       
                       </div>
                       </div>
                       
              <!-- button -->
                 <button type="button" class="buttonMi mt-4" ><a class="buttonlink" href="../HomeAdmin.php">Back</a></button>
                 <button type="submit" class="buttonMi mt-4" >Create</button>
         
             
             
             </div>
       </div>
       
         
      
       
     <!-- <span class="Yloginspan mt-3">Create a <a href="" class="YColor3e306b">NEW ACCOUNT ?</a></span> -->

    </form>

  </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script> 
<script>
document.addEventListener("DOMContentLoaded", function() {
    var settings = {
        plugins: ['remove_button'],
        persist: false,
        createOnBlur: true,
        create: true
    };
    new TomSelect('#tselect', settings);
});
</script>

 </body>
</html>

