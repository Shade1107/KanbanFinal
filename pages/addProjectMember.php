<?php
require_once('../Models/Project.php');
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
    <h3 class="text-center mt-5">Projects</h3>
    <table class="Yproject_table  mt-5 " cellpadding='10px' cellspacing='20px'>
                  <tr >
                    <td> Name </td>
                    <td>: Yin Myo Myat</td>
                  </tr>
                  <tr>
                    <td> Role </td>
                    <td>: Member</td>
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
              <div class="YlineChart">
              <canvas id="YmylineChart" ></canvas>
            </div>
  </div>
  <div class="col-lg-9">
    <?php if(isset($projects) && !empty($projects)) : ?>

      <?php foreach ($projects as $project) : ?>
        <div class="Ytask-columns-container mt-3" id="taskColumnsContainer">
          <div class="Ytask-column" id="backlog">
            <a href="HomeAdmin.php?project_id=<?= $project->id ?>" class="text-decoration-none">
              <h3><?= $project->name?></h3>
              <div class="col-lg-4 ">
                <div class="Ytask-column ">
                    <canvas id="YmyChart<?=$i ?>" class="YChart"></canvas>
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
    // Generate the first pie chart
    var labels = [];
    var data = [];
    <?php foreach($project as $r): ?>
        labels.push("<?=$r["stage"]?>");
        data.push(<?=$r["task"]?>);
    <?php endforeach; ?>
    generatePieChart('YmyChart1', labels, data,'Project');

    // Generate the line chart
    var labels = [];
    var data = [];
    <?php foreach($totalProject as $tp): ?>
        labels.push("<?=$tp["project"]?>");
       
    <?php endforeach; ?>

    <?php foreach($donePercentage as $dp): ?>
        data.push(<?=$dp?>);
    <?php endforeach; ?>
    generateLineChart('YmylineChart', labels, data,'Done percentage for each project');

</script>
</body>
</html>
