<?php 
$isAdminMemberFromPJwebpage = true;
require_once('../header_footer/header.php');
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
    <h3 class="text-center mt-5">Project</h3>
    
  </div>
  <div class="col-lg-9">
    <div class="Ytask-columns-container mt-3" id="taskColumnsContainer">
      <div class="Ytask-column" id="backlog">
      <a href="#" class="text-decoration-none "><h3>Project 1</h3></a>
      <hr>
      </div>

      <div class="Ytask-column" id="backlog">
      <a href="#" class="text-decoration-none"><h3>Project 2</h3></a>
      <hr>
      </div>

      <div class="Ytask-column" id="backlog">
      <a href="#" class="text-decoration-none "><h3>Project 3</h3></a>
      <hr>
      </div>

      <div class="Ytask-column" id="backlog">
      <a href="#" class="text-decoration-none "><h3>Project 4</h3></a>
      <hr>
      </div>

      <div class="Ytask-column" id="backlog">
      <a href="#" class="text-decoration-none "><h3>+</h3></a>
      <hr>
      </div>

      

    </div>
  </div>
</section>
<?php require_once('../header_footer/footer.php'); ?>
  </body>
</html>
