<?php 
require_once('../header_footer/header.php');
require_once('../Repositories/UserRepository.php');



?>
<!Doctype html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="../image/png" href="image/logo.PNG">

  
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
</style>

 </head>  
 <body class="YHomeBodyColor">
 
    <div class="container-fluid row">
    <div class="col-lg-7 YloginImg ee92a9">
   
      </div>

  <!-- form -->
    <div class="Miprojectform  ee92a9 mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <h1 class="loginFormText">⟁ Add Task</h1>
            <?php
        require_once ('../Repositories/ProjectRepository.php');

        if (isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            $prorepo = new ProjectRepository(DatabaseConnection::getInstance());
            $project = $prorepo->find($id);

            if (isset($project)) {
        ?>
          <input type="hidden" name="id" value="<?php echo $project->id;?>">
      <?php
            } else {
                echo "<p>not found.</p>";
            }
        }
        ?>


        <div class="Yinputfieldcenter">
              <div class="mt-5 Miinput">
                
              <!-- task name -->
             <input type="text" id="" class="Miinput-field" placeholder="add task" name="task_name"><br>

               <!-- add member -->
            <div class="addmember">  
          
          <table class="searchtable">
          <?php
            // require_once ("../Repositories/Task_memberRepository.php");
            // $task_id = 3;

            // $taskMemberRepo = new taskMemberRepository(DatabaseConnection::getInstance());
            // $taskMembersTaskId = $taskMemberRepo->findWithTaskID($task_id);
        
            // $taskmember_id = array();
        
            // foreach($taskMembersTaskId as $p){
            //     $user_id = $p->user_id;
            //     $taskmember_id[] = $user_id; 
            // }

            $userRepo = new projectMemberRepository(DatabaseConnection::getInstance());
            $member = $userRepo->getAll();
            ?>
         <tr>
         <td><i class="fa-solid fa-magnifying-glass searchicon"></i></td>
         
         <td>
          <!-- <input type="text" name="k" placeholder="search member to add" autocomplete="off" class="inputsearch mt-4 "> -->
          <select id="tselect" class="select" placeholder="search member to add" name="members" multiple>
<?php foreach ($member as $m) : ?>
                    ?>
    <option value="<?php echo htmlspecialchars($m->user_id); ?>">
        <?php echo htmlspecialchars($m->getUser()->name); ?>
    </option>

<?php endforeach; ?>
</select>

        </td>
         
         <!-- <td><input type="submit" name="" value="search" class="mt-4 buttonsearch"></td><br> -->

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
                  <button type="button" class="buttonMi mt-4" ><a class="buttonlink" href="HomeAdmin.php">Create</a></button>
          
              
              
              </div>
        </div>
        
          
       
        
      <!-- <span class="Yloginspan mt-3">Create a <a href="" class="YColor3e306b">NEW ACCOUNT ?</a></span> -->
        
        
        
      
      </form>

   </div>
   </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script> 
<script>
var settings = {
  plugins: ['remove_button'],
	persist: false,
	createOnBlur: true,
	create: true
};
new TomSelect('#tselect',settings);
</script>
  </body>
</html>
