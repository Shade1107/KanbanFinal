<?php 
require_once('../header&footer/header.php');
include('DB_connection.php');
// require_once('header&footer/footer.php');

require_once('chart_data_function.php');

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

 </head>  
 <body class="">
 <section class="Ycolumn-container row  ">
 <div class="col-lg-3 MiYprofile-edit-leftsidebar">
     <!-- photo edit -->
     <div class="wrapper mt-4">
 <input type="file" class="myfile">
</div>
<!-- <br> -->

   <div class="container-edit">   
   <div>
   &nbsp; &nbsp;&nbsp; <label for="" class="labeledit mt-2">Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="" class="Miinput-fieldedit  p-3 mb-2 rounded" ><br>
    </div>
    <!-- <br> -->

    <div>
    &nbsp;&nbsp; &nbsp; <label for="" class="labeledit mt-2">Email :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="email" id="" class="Miinput-fieldedit  p-3 mb-2 rounded" ><br>
    </div>
    <!-- <br> -->

    <div>
    &nbsp;&nbsp;&nbsp;&nbsp; <label for="" class="labeledit mt-2">Password :</label>&nbsp;
    <input type="password" id="" class="Miinput-fieldedit  p-3 mb-2 rounded" ><br>
    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
    </div>
    <!-- <br> -->
    
    <div>
    &nbsp;&nbsp;&nbsp;&nbsp; <label for="" class="labeledit mt-2">Gender :</label>&nbsp;&nbsp;&nbsp;&nbsp;
    <select class="Miinput-fieldedit bg-white  p-2 mb-2 rounded">
        <option>Male</option>
        <option>Female</option>
    </select>
    </div><br>
    </div>
    
    <div class="container-button-edit">
    <button type="button" class="buttonMiedit"  ><a class="buttonlink" href="../HomeAdmin.php">Back</a></button>
   <button type="button" class="buttonMiedit" ><a class="buttonlink" href="../HomeAdmin.php">Edit</a></button>
   </div>
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
              require_once('../header&footer/footer.php');
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