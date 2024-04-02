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

<!DOCTYPE HTML>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="../js/charts.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="icon" type="image/png" href="../image/logo.PNG">
</head>
<body class="">
  <section class="Ycolumn-container row">
    <div class="leftSideBar col-lg-3 ">
      <h3 class="text-center Ypjh3 pb-3 mt-3 mb-3">Projects</h3>
      <table class="Yproject_table mt-5" cellpadding='10px' cellspacing='20px'>
        <tr>
          <td>Name</td>
          <td>: Yin Myo Myat</td>
        </tr>
        <tr>
          <td>Role</td>
          <td>: Member</td>
        </tr>
        <tr>
          <td>Total Projects</td>
          <td>: 4</td>
        </tr>
        <tr>
          <td>Average Done Rate</td>
          <?php
          // Include chart_data_function.php and calculate overall_done_rate
          require_once('chart_data_function.php');
          ?>
          <td>: <?=$overall_done_rate ?? ''?>%</td>
        </tr>
      </table>

      <div class="YlineChart">
        <canvas id="YmylineChart"></canvas>
      </div>
    </div>
    <div class="col-lg-9 row">
      <?php foreach ($projects as $p) : ?>
        <div class="col-lg-4 ">
          <div class="Ytask-column">
            <canvas id="YmyChart <?php echo $p->name ?>" class="YChart"> </canvas>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <script>
    // Generate charts based on dynamically fetched data
    const projectData = <?php $projects; ?>; // Get project data from PHP

    // Loop through project data and generate charts
    for (const <?php $projects->$name ?> in <?php $projects ?>) {
      const project = projectData[projectName]; // Get project data for current loop

      // Generate a pie chart for the current project
      var labels = [];
      var data = [];
      for (const item of project) {
        labels.push(item.stage);
        data.push(item.task);
      }
      generatePieChart(`YmyChart${projectName}`, labels, data, projectName); // Use project name as chart title
    }

    // Generate the line chart (similar logic)
    var labels5 = [];
    var data5 = [];
    for (const projectName in projectData) {
      // Calculate done percentage for each project (replace with your logic)
      const donePercentage = /* Calculate done percentage for the project */;
      labels5.push(projectName);
      data5.push(donePercentage);
    }

    generateLineChart('YmylineChart', labels5, data5, 'Done percentage for each project');
  </script>

<?