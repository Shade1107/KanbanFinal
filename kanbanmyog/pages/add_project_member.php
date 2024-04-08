<?php
    require_once('../Database/DatabaseConnection.php');
    require_once('../Repositories/UserRepository.php');
    require_once('../Repositories/RoleRepository.php');
    require_once('../Repositories/GenderRepository.php');
    require_once('../header_footer/header.php');
    // require_once('../Repositories/pie-chart.php');
    require_once('../Repositories/ProjectRepository.php');

    $isAdminMemberFromPJwebpage = true;

    // Get the user ID from the URL parameter
    $id = $_SESSION['user_id'];
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    $user = $userRepo->find($id);
    $role_id = $user->role_id;
    $totalProjects = $user->getTotalProjects();

    $dbConnection = DatabaseConnection::getInstance();
    $projectRepository = new ProjectRepository($dbConnection);
    $projects = $projectRepository->getAll();

?>

<!DOCTYPE HTML>
<html>
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
    <link rel="icon" type="image/png" href="../image/logo2_2.PNG">
</head>
<body class="">

    <section class="Ycolumn-container row">
        <div class="leftSideBar col-lg-3 ">    
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
             
            <!-- </div> -->
            <div class="YlineChart">
              <canvas id="YmylineChart" ></canvas>
            </div>
            
        </div>
        <div class="col-lg-9 row">
           
            <!-- <h3 class="text-center Ypjh3 mt-3 mb-3">Projects</h3> -->
            <?php if(isset($projects) && !empty($projects)) : ?>
          
                <?php foreach ($projects as $project): ?>
            <?php
            

            // Get stage data for the current project
            $stages = $projectRepository->getPieBarChartData($project->id);
           
            ?>

                <div class="col-lg-4 ">
                <a href="../home_member.php?id=<?= $project->id ?>">
                  <div class="Ytask-column  ">
                      <canvas id="YmyChart<?= $project->id ?>" class="YChart"></canvas>
                  </div>
                </a>
                </div>  
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                        // JavaScript code for generating pie chart
                        var labels<?= $project->id ?> = [];
                        var data<?= $project->id ?> = [];
                        <?php foreach ($stages as $stage): ?>
                        labels<?= $project->id ?>.push("<?= $stage["stage"] ?>");
                        data<?= $project->id ?>.push(<?= $stage["count"] ?>);
                        <?php endforeach; ?>

                    //     new Chart(document.getElementById("YmyChart<?= $project->id ?>"), {
                    //         type: 'pie',
                    //         data: {
                    //             labels: labels<?= $project->id ?>,
                    //             datasets: [{
                    //                 data: data<?= $project->id ?>
                    //             }]
                    //         },
                    //         options: {
                    //             title: {
                    //                 display: true,
                    //                 text: 'Chart JS Pie Chart Example'
                    //             }
                    //         }
                    //     });

                    //use chart.js generatePieChart function to show chart with customized color
                     generatePieChart("YmyChart<?= $project->id ?>", labels<?= $project->id ?>, data<?= $project->id ?> ,"<?= $project->name?>");
                
                    });

                    </script>
            <?php endforeach; ?>
    <?php else : ?>
      <p>No projects found</p>
    <?php endif; ?>  

    </section>

<?php 
$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/footer.php');
?>

</body>
</html>
