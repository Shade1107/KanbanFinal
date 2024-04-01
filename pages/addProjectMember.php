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
          <a href="project_details.php?project_id=<?= $project->id ?>" class="text-decoration-none">
            <h3><?= $project->name ?></h3>
          </a>
          <p>  </p>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>No projects found</p>
    <?php endif; ?>
  </div>
</section>

<?php require_once('../header_footer/footer.php'); ?>
</body>
</html>
