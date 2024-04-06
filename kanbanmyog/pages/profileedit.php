<?php
require_once('../header_footer/header.php');
include('DB_connection.php');
// require_once('header&footer/footer.php');

require_once('chart_data_function.php');

require_once("../Database/DatabaseConnection.php");
require_once("../Repositories/UserRepository.php");
$id = $_SESSION['user_id'];
$userRepo = new UserRepository(DatabaseConnection::getInstance());
$user = $userRepo->find($id);
$role_id= $user->role_id;
$result = false;
  // Check if the form has been submitted
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])){
   if(!empty($_FILES['profilePic']['name'])){
    $img_name = $_FILES['profilePic']['name'];
    $tmp_name = $_FILES['profilePic']['tmp_name'];
     
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = "IMG-". $id . '.'.$img_ex_lc;
				$img_upload_path = '../image/'.$new_img_name;
        $r = move_uploaded_file($tmp_name, $img_upload_path);
     }
    }else
    {
      // $userRepo = new UserRepository(DatabaseConnection::getInstance());
      // $user = $userRepo->find($id);
      $new_img_name = $user->img;
    }
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $result = $userRepo->update($id, $new_img_name, $name, $email, $password, $gender, $role_id);

     // exit();
    if($result){
    header('Location: viewprofile.php');
    exit;
    }else {
      echo "Sorry, updating profile fails.";
     }
}
?>
<?php
  $imagePath = (isset($user->img) && !empty($user->img)) ? "../image/".$user->img : "../image/default.jpg";

?>
<!Doctype html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo2_2.PNG">

    <!-- Include the JavaScript file -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
 <!-- custom chart.js  -->
  <script src="../js/charts.js"></script> 
  <script src="../js/javascript.js"></script>

 </head>  
 <body class="">
 <section class="Ycolumn-container row  ">
 <div class="col-lg-3 MiYprofile-edit-leftsidebar">
  <form action="profileedit.php" method="POST" enctype="multipart/form-data">
     <!-- photo edit -->
     <div class="wrapper mt-4">
     <img src="<?= $imagePath ?>" id="photoPreview" alt="avatar" onclick="document.getElementById('file').click();">  
 <input type="file" id="file" class="myfile" accept=".jpg, .jpeg, .png" name="profilePic" onchange="previewPhoto(event)">
</div>
<!-- <br> -->

   <div class="container-edit">   
   <div>
   &nbsp; &nbsp;&nbsp; <label for="name" class="labeledit mt-2">Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?= $user->name ?>" required class="Miinput-fieldedit  p-3 mb-2 rounded" name="name"><br>
    </div>
    <!-- <br> -->

    <div>
    &nbsp;&nbsp; &nbsp; <label for="email" class="labeledit mt-2">Email :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="email" value="<?= $user->email ?>" required class="Miinput-fieldedit  p-3 mb-2 rounded" name="email" ><br>
    </div>
    <!-- <br> -->

    <div>
    &nbsp;&nbsp;&nbsp;&nbsp; <label for="password" class="labeledit mt-2">Password :</label>&nbsp;
    <input type="password" value="<?= $user->password ?>" required name="password" class="Miinput-fieldedit  p-3 mb-2 rounded" ><br>
    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
    </div>
    <!-- <br> -->
    
    <div>
    &nbsp;&nbsp;&nbsp;&nbsp; <label for="gender" class="labeledit mt-2">Gender :</label>&nbsp;&nbsp;&nbsp;&nbsp;
    <select class="Miinput-fieldedit bg-white  p-2 mb-2 rounded" name="gender" required>
    <option value="">Select Gender</option>
    <option value="1">Male</option>
    <option value="2">Female</option>
    </select>
    </div><br>
    </div>
    
    <div class="container-button-edit">
    <button type="button" class="buttonMiedit"  ><a class="buttonlink" href="../home_admin.php">Back</a></button>
   <input type="submit" class="buttonMiedit" name="save" value="Save">
   </div>

  </form>
    </div>
  

    <div class="col-lg-9 row ">
           
            <!-- <h3 class="text-center Ypjh3 mt-3 mb-3">Projects</h3> -->
              <div class="col-lg-4 Yprojectfromprofile d-flex justify-content-center align-items-center">
              <!-- <div class="coloredit ">
                   
                </div> -->
                <div class="Yproject_card ">
                      <div class="Yproject_img_name d-flex">
                          
                          <span class=" Yproject"> Project 1</span>
                      </div>

                      <div class="YlineChart_profileview_page">
                        <canvas id="Yproject1" class="Yprojectforspecuser"  width="435" height="217"></canvas>
                      </div>

                    </div>
              </div>  

              <div class="col-lg-4 Yprojectfromprofile d-flex justify-content-center align-items-center">
              <!-- <div class="coloredit ">
                   
                </div> -->
                <div class="Yproject_card ">
                      <div class="Yproject_img_name d-flex">
                          
                          <span class=" Yproject"> Project 1</span>
                      </div>

                      <div class="YlineChart_profileview_page">
                        <canvas id="Yproject1" class="Yprojectforspecuser"  width="435" height="217"></canvas>
                      </div>

                    </div>
              </div>  

              <div class="col-lg-4 Yprojectfromprofile d-flex justify-content-center align-items-center">
              <!-- <div class="coloredit ">
                   
                </div> -->
                <div class="Yproject_card ">
                      <div class="Yproject_img_name d-flex">
                          
                          <span class=" Yproject"> Project 1</span>
                      </div>

                      <div class="YlineChart_profileview_page">
                        <canvas id="Yproject1" class="Yprojectforspecuser"  width="435" height="217"></canvas>
                      </div>

                    </div>
              </div>  

              <div class="col-lg-4 Yprojectfromprofile d-flex justify-content-center align-items-center">
              <!-- <div class="coloredit ">
                   
                </div> -->
                <div class="Yproject_card ">
                      <div class="Yproject_img_name d-flex">
                          
                          <span class=" Yproject"> Project 1</span>
                      </div>

                      <div class="YlineChart_profileview_page">
                        <canvas id="Yproject1" class="Yprojectforspecuser"  width="435" height="217"></canvas>
                      </div>

                    </div>
              </div>  
    </div>
   </section>

              <?php
              require_once('../header_footer/footer.php');
                 ?>

<script>
    // Generate the bar chart
   // Generate the line chart
  var labels1 = [];
    var data1 = [];
    <?php foreach($member1 as $m): ?>
        labels1.push("<?=$m["stage"]?>");
        data1.push("<?=$m["task"]?>");
       
    <?php endforeach; ?>

    generateLineChart_for_member('Yproject1', labels1, data1);
</script> 
 </body>
 </html>