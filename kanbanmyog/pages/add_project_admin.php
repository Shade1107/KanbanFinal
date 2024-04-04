<?php
session_start();
?>
<?php
require_once('../Models/Project.php');
require_once('../Repositories/ProjectRepository.php');
require_once('../Database/DatabaseConnection.php');
require_once('../Repositories/Project_memberRepository.php');

$id = $_SESSION['user_id'];
    
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    // Find the user with the specified ID
    $user = $userRepo->find($id);
    $role_id = $user->role_id;


$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/header.php');
?>
<?php
$dbConnection = DatabaseConnection::getInstance();
$projectRepository = new ProjectRepository($dbConnection);
$projects = $projectRepository->getAll();
?>
<!DOCTYPE HTML>
<html>
<head>
  <!-- Include the JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- custom chart.js  -->
    <script src="../js/charts.js"></script> 
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo2_2.PNG">
</head>
<body class="">
    <section class="Ycolumn-container row">
        <div class="leftSideBar col-lg-3 ">
            
        <h3 class="text-center Ypjh3 pb-3 mt-3 mb-3">Projects</h3>
              <table class="Yproject_table  mt-5 " cellpadding='10px' cellspacing='20px'>
                  <tr >
                    <td>User's Name </td>
                    <td><?php echo $user->name; ?></td>
                  </tr>
                  <tr>
                    <td>User's Role </td>
                    <td><?php echo $user->role_id == 1 ? 'Admin' : 'Member'; ?></td>
                  </tr>
                  <tr>
                     <td> Total Projects</td>
                    <td>: 4</td>
                  </tr>

                  <tr>
                     <td> Average Done Rate</td>
                     <?php 
                        require_once('chart_data_function.php');
                     ?>
                    <td>: <?=$overall_done_rate??''?>%</td>
                  </tr>
              </table>
             
            <!-- </div> -->
            <div class="YlineChart">
              <canvas id="YmylineChart" ></canvas>
            </div>
            
        </div>
        <div class="col-lg-9 row">
           
            <!-- <h3 class="text-center Ypjh3 mt-3 mb-3">Projects</h3> -->
              <div class="col-lg-4 ">
                <a href="../home_admin.php">
                    <div class="Ytask-column  ">
                        <canvas id="YmyChart1" class="YChart"></canvas>
                    </div>
                </a>

              </div>  

              <div class="col-lg-4 ">
              <a href="../home_admin.php">
                <div class=" Ytask-column">
                    <canvas id="YmyChart2" class="YChart"></canvas>
                </div>
              </a>
              </div>

              <div class="col-lg-4 ">
              <a href="../home_admin.php">
                <div class="Ytask-column ">
                    <canvas id="YmyChart3" class="YChart"></canvas>
                </div>
              </a>
              </div>
               <div class="col-lg-4">
               <a href="../home_admin.php">
                <div class="Ytask-column ">
                    <canvas id="YmyChart4" class="YChart"></canvas>
                </div>
               </a>
              </div>


              <div class="col-lg-4">
                <div class="Ytask-column ">
                    <div class="YChart">
                      <!-- <span class="">+</span> -->
                      <div class="YChart Yplus_sign_project"><span><a href="createproject.php"> <i class="fa-regular fa-square-plus"></i></a></span></div>
                    </div>
                    <div></div>
                </div>
              </div>
          
        </div>
    </section>

<?php 
$isAdminMemberFromPJwebpage = true;
require_once('../header&footer/footer.php');

// require_once('chart_data_function.php');
?>


<script>
    // Generate the first pie chart
    var labels1 = [];
    var data1 = [];
    <?php foreach($project1 as $r): ?>
        labels1.push("<?=$r["stage"]?>");
        data1.push(<?=$r["task"]?>);
    <?php endforeach; ?>
    generatePieChart('YmyChart1', labels1, data1,'Project1');

    // Generate the second pie chart
    var labels2 = [];
    var data2 = [];
    <?php foreach($project2 as $r): ?>
        labels2.push("<?=$r["stage"]?>");
        data2.push(<?=$r["task"]?>);
    <?php endforeach; ?>
    generatePieChart('YmyChart2', labels2, data2,'Project2');

     // Generate the third pie chart
    var labels3 = [];
    var data3 = [];
    <?php foreach($project3 as $r): ?>
        labels3.push("<?=$r["stage"]?>");
        data3.push(<?=$r["task"]?>);
    <?php endforeach; ?>
    generatePieChart('YmyChart3', labels3, data3,'Project3');

     // Generate the fourth pie chart
    var labels4 = [];
    var data4 = [];
    <?php foreach($project4 as $r): ?>
        labels4.push("<?=$r["stage"]?>");
        data4.push(<?=$r["task"]?>);
    <?php endforeach; ?>
    generatePieChart('YmyChart4', labels4, data4,'Project4');

    // Generate the line chart
    var labels5 = [];
    var data5 = [];
    <?php foreach($totalProject as $tp): ?>
        labels5.push("<?=$tp["project"]?>");
       
    <?php endforeach; ?>

    <?php foreach($donePercentage as $dp): ?>
       
        data5.push(<?=$dp?>);
    <?php endforeach; ?>

    

    generateLineChart('YmylineChart', labels5, data5,'Done percentage for each project');

</script>

</body>
</html>
