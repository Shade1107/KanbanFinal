<?php 
require_once('../header_footer/header.php');
require_once('../Repositories/UserRepository.php');
require_once('../Models/Project.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  //$admin_id = htmlspecialchars(($_GET["id"]));
  $projectName = htmlspecialchars($_POST["projectName"]);
  $membersArray = htmlspecialchars($_POST["members"]);
  $description = htmlspecialchars($_POST["Description"]);
  $detail_description = htmlspecialchars($_POST["Detail_Description"]);
  $createDate = htmlspecialchars($_POST["createDate"]);
  $targetDate = htmlspecialchars($_POST["targetDate"]);

  echo "Jive";
  echo $projectName."<br>";
  print_r($membersArray)."<br>";
  echo $description."<br>";
  echo $detail_description."<br>";
  echo $createDate."<br>";
  echo $targetDate."<br>";

  $project = new Project(2,$projectName,$description,$detail_description,$createDate,$targetDate);
  
  // $project->admin_id = 2;
  // $project->name = $projectName;
  // $project->description = $description;
  // $project->detail_descrip = $detail_description;
  // $project->create_date = $createDate;
  // $project->due_date = $targetDate;

  $result = Project::create($project);
  if ($result) {
    header("Location: addProjectAdmin.php");
    exit();
}


}
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <h1 class="loginFormText">⟁ Add Project</h1>
          <!-- <span class="Yloginspan">Welcome to our Kanban</span> -->
          <div class="Yinputfieldcenter">
            <div class="mt-5 Miinput">   
              <input type="text" id="" class="Miinput-field mt-3-" placeholder="Project Name" name="projectName"><br>
              <!-- add member -->
              <div class="addmember">  
                <table class="searchtable">
                    <?php
                    $userRepo = new UserRepository(DatabaseConnection::getInstance());
                    $member = $userRepo->getAll();
                    ?>
                  <tr>
                    <td><i class="fa-solid fa-magnifying-glass searchicon"></i></td>
         
                    <td>
                      <!-- <input type="text" name="k" placeholder="search member to add" autocomplete="off" class="inputsearch mt-4 "> -->
                      <select id="tselect" class="select" placeholder="search member to add" name="members" multiple>
                        <?php foreach ($member as $m) : ?>
                          <option value="<?php echo htmlspecialchars($m->id); ?>">
                            <?php echo htmlspecialchars($m->name); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
         
                      <!-- <td><input type="submit" name="" value="search" class="mt-4 buttonsearch"></td><br> -->
                  </tr>
                </table>  
              </div>

              <div class="desContainer">
                <div class="input-group mt-4 ">
                  <span>Description</span>
                  <textarea class="des" id="des" name="Description"></textarea>
                </div>
              </div>

              <div class="detailDesContainer">
                <div class="input-group mt-4 ">
                  <span>Detail Description</span>
                  <textarea class="Detail_des" id="Detail_des" name="Detail_Description"></textarea>
                </div>
              </div>

              <div class="datecontainer">
                  <div class="input-group mt-4 ">
                    <span class="input-group-text" id="basic-addon3">Choose your create date</span>
                    <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="createDate">
                  </div>
              </div>
                
               <!-- target date -->   
              <div class="datecontainer">        
                <div class="input-group mt-4" >
                  <span class="input-group-text" id="basic-addon3">Choose your target date</span>
                  <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="targetDate">
                </div>
              </div>  

              <button type="button" class="buttonMi mt-5"><a class="buttonlink" href="addProjectAdmin.php">Back</a></button>
              <button type="submit" class="buttonMi mt-5"><a class="buttonlink" href="addProjectAdmin.php">Create</a</button>
                  
            </div>
          </div>  
        </form>
      </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
var settings = {
  plugins: ['remove_button'],
	persist: false,
	createOnBlur: true,
	create: false
};
new TomSelect('#tselect',settings);
</script>

  </body>
</html>
