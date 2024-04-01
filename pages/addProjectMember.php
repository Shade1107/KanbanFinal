<?php
require_once('../Models/Project.php');
require_once('../Repositories/ProjectRepository.php');
require_once('../Database/DatabaseConnection.php');
require_once('../Repositories/StageRepository.php');
require_once('../Repositories/TaskRepository.php');
require_once('../pages/chart_data_function.php');

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
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo.PNG">
    <!-- Include the JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- custom js  -->
    <script src="charts_js/pie_chart.php"></script>
 </head>
 <body class="YHomeBodyColor">
 <section class="Ycolumn-container row">
  <div class="leftSideBar col-lg-3 h-10">
    <h3 class="text-center mt-5">Projects</h3>
  </div>
  <div class="col-lg-9">
    <?php if (isset($projects) && !empty($projects)) : ?>
      <?php foreach ($projects as $project) : ?>
        <div class="Ytask-columns-container mt-3" id="taskColumnsContainer">
          <div class="Ytask-column" id="backlog">
            <a href="HomeAdmin.php?project_id=<?= $project->id ?>" class="text-decoration-none">
              <h3><?= $project->name?></h3>
            </a> 
            <div class="Ytask-column">
                <canvas id="YmyChart<?= $project->id ?>" class="YChart"></canvas>
              </div>
              <script>
                fetch('pie_chart.php?id=<?= $project->id ?>')
                  .then(response => response.json())
                  .then(data => {
                    generatePieChart('YmyChart<?= $project->id ?>', data);
                  })
                  .catch(error => console.error('Error fetching chart data:', error));
              </script>
          </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>No projects found</p>
    <?php endif; ?>
  </div>
</section>


<?php 
$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/footer.php');
?>

<script>
     // Generate the fourth pie chart
    var labels = [];
    var data = [];
    <?php foreach($project as $r): ?>
        labels.push("<?=$r["stage"]?>");
        data.push(<?=$r["task"]?>);
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
