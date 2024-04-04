<?php 
require_once('../header_footer/header.php');
require_once('chart_data_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" />

  <!-- title logo  -->
  <link rel="icon" type="image/png" href="../image/logo2_2.PNG">

   <!-- Include the JavaScript file -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
 <!-- custom chart.js  -->
  <script src="../js/charts.js"></script> 
</head>

<body>
  <div class="container_pc">
	  <div class="pcside row">
      <!-- left column -->
      <div class="pcdiv1 col-lg-3">
        <form class="pcform" method="">
        
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <a href="#" class="circle-container ">
                    <img src="../image/p4.jpg" class="Yproviewimg">
                  </a>
                
                <br>
                <br>
                <h3>Personal info</h3>
            </div>
          </div>

        <table class="pctable mt-5" cellpadding='10px' cellspacing='20px' >
            <tr>
              <th>Name</th>
              <td >Name</td>
          
            </tr>
            <tr >
              <th>Email</th>
              <td>Email</td>
            
            </tr>
            <tr>
              <th >Gender</th>
              <td>Gender</td>
            
            </tr>
            <tr>
              <th>Role</th>
              <td></td>
            
            </tr>    
          </table> 
          <br>
          <button type="submit" class="button mt-1 Ypfchangebtn mb-5">Edit</button></form>
      
      </div>
      <div class="col-lg-9 row">
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
    </div>
  </div>

	
<?php 
  require_once('../header_footer/footer.php');
 ?>
	<!-- This is link of adding small images
		which are used in the link section -->
	<script src="https://kit.fontawesome.com/704ff50790.js" crossorigin="anonymous"></script>
  
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
