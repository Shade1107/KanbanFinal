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
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo.PNG">
    <!-- Include the JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- custom js  -->
    <script src="../js/charts.js"></script>
 </head>
 <body class="YHomeBodyColor">
 <section class="Ycolumn-container row">
  <div class="leftSideBar col-lg-3 h-10">
    <h3 class="text-center mt-5">Projects</h3>
  </div>
  <div class="col-lg-9">
    <?php if(isset($projects) && !empty($projects)) : ?>
      <?php foreach ($projects as $project) : ?>
        <div class="Ytask-columns-container mt-3" id="taskColumnsContainer">
          <div class="Ytask-column" id="backlog">
            <a href="HomeAdmin.php?project_id=<?= $project->id ?>" class="text-decoration-none">
              <h3><?= $project->name?></h3>
              <div class="d-350">
                <canvas id="pie-chart"></canvas>
            </div>
              <?php 
                      $project_id = $project->id;

                      $conn = DatabaseConnection::getInstance();
                      $query = "select s.name stage, count(t.id) count 
                                  from stages s
                                  left join tasks t on t.stage_id  = s.id
                                  WHERE t.project_id = '$project_id' AND s.project_id = '$project_id'
                                  group by s.id
                              ";
                      $result = $conn->query($query);
                      $stages = [];
                      while($row = mysqli_fetch_assoc($result)){
                          $stages[] = $row;
                      }
              ?>
            </a> 
          </div>
          <div>
      <?php endforeach; ?>
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
</body>
</html>
