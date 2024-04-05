<?php
require_once('../Models/Project.php');
require_once('../Models/User.php');
require_once('../Repositories/ProjectRepository.php');
require_once('../Database/DatabaseConnection.php');


$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/header.php');
?>
<?php
$dbConnection = DatabaseConnection::getInstance();
$projectRepository = new ProjectRepository($dbConnection);
$projects = $projectRepository->getAll();
?>

<!Doctype html>
<head>
<!-- Include the JavaScript file -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- custom js  -->
<script src="../js/charts.js"></script>
 <!-- font awesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- custom css  -->
<link rel="stylesheet" href="../css/style.css" type="text/css">
<!-- title logo  -->
<link rel="icon" type="image/png" href="../image/logo.PNG">
 </head>
 <body class="YHomeBodyColor">

 <section class="Ycolumn-container row">
  <div class="leftSideBar col-lg-3 h-10">
    <?php
    require_once '../Repositories/UserRepository.php';
    require_once '../Repositories/RoleRepository.php';
    require_once '../Repositories/GenderRepository.php';

    $id = $_SESSION['user_id']; // Get the user ID from the URL parameter
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    $user = $userRepo->find($id);// Find the user with the specified ID
    $role_id = $user->role_id;
    $totalProjects = $user->getTotalProjects(); //print_r($user);
    ?>

  <h3 class="text-center Ypjh3 pb-3 mt-3 mb-3">Projects</h3>
              <table class="Yproject_table  mt-5 " cellpadding='10px' cellspacing='20px'>
                  <tr >
                    <td>User's Name </td>
                    <td><?=$user->name; ?></td>
                  </tr>
                  <tr>
                    <td>User's Role </td>
                    <td><?=$user->role_id == 1 ? 'Admin' : 'Member'; ?></td>
                  </tr>
                  <tr>
                     <td> Total Projects</td>
                    <td><?=$totalProjects?></td>
                  </tr>
                  <tr>
                     <td> Average Done Rate</td>
                     <?php 
                        require_once('chart_data_function.php');
                     ?>
                    <td>: <?=$overall_done_rate??''?>%</td>
                  </tr>
              </table>
             
              <div class="YlineChart">
                <canvas id="YmylineChart" ></canvas>
              </div>
  </div>
  <div class="col-lg-9">
    <?php if(isset($projects) && !empty($projects)) : ?>

      <?php foreach ($projects as $project) : ?>
        <div class="Ytask-columns-container mt-3" id="taskColumnsContainer">
          <div class="Ytask-column" id="backlog">
            <a href="HomeMember.php?id=<?= $project->id ?>" class="text-decoration-none">
              <h3><?= $project->name?></h3>
              <div class="col-lg-4 ">
                <div class="Ytask-column ">
                    <canvas id="YmyChart" class="YChart"></canvas>
                </div>
              </div>  
            </a> 
          </div>
        </div>
      <!-- </div> -->
      <?php 
      endforeach; ?>
    <?php else : ?>
      <p>No projects found</p>
    <?php endif; ?>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

<?php 
$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/footer.php');
?>

<script>
// // Generate pie and line charts using dynamic data from chart_data_function.php
// var pieChartData = <?php echo json_encode($pieChartData); ?>;
// generatePieChart('YmyChart', pieChartData.labels, pieChartData.data, 'Tasks per Stage');

// var lineChartData = <?php echo json_encode($lineChartData); ?>;
// generateLineChart('YmylineChart', lineChartData.labels, lineChartData.data, 'Done Percentage');
</script>
</body>
</html>
