<?php 
$isCreateProject = true;
require_once('../header_footer/header.php');
include('DB_connection.php');
// require_once('header&footer/footer.php');

?>
<!Doctype html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/Mistyle.css" /> -->
    <!-- title logo  -->
    <link rel="icon" type="../image/png" href="../image/logo2_2.PNG">

 </head>  
 <body class="YHomeBodyColor">
 <section class="Ycolumn-container YMicolumn-container pb-5 ">
  <div class="row">
      
  <!-- picture -->
  <div class="col-lg-7  d-flex justify-content-center align-items-center">
    <div class="MiYimgspace"></div>
  </div>

     <!-- add  task -->
 <div class="col-lg-5">


<form action="" method="GET" name="">

 <div class="text"><h1 class="loginFormText mt-5 ">⟁ Create Project</h1>
 
</div>

   <!-- task name -->
 <div class="Yinput-container text-center">

 <input type="text" id="" class="Miinput-field mt-5" placeholder="Enter Project title"><br>
 


<!-- add member -->
<div class="addmember"> 
 
<?php
     $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
       
     $query = mysqli_query($conn,"SELECT * FROM users order by name;");
     $result_count = mysqli_num_rows($query);

     //check to see is any results were returned
     if($result_count > 0){
       
     
       echo '<select id="tselect" class="select mt-1" placeholder="search member to add" multiple>';
       while($row = mysqli_fetch_assoc($query)){
                 
         echo'  <option value='.$row['id'].'>'.$row['name'].'</option>';
     
       }
       echo '</select>';
       echo '<div></table>';
     }

     //check to see if  the keyword will provided
         if (isset($_GET['k']) && $_GET['k'] != '' ) {

           //save the keyword from url
           $k = trim($_GET['k']);

           //create a base query word string
           $query_string = " SELECT * FROM users WHERE ";
           $display_word = "";
           // echo  $query_string ;
           //sperate each of keyword
           $keyword = explode(' ',$k);

           foreach($keyword as $word){
             $query_string .= " name LIKE '%".$word."%' OR ";
             $display_word .= $word." "; 
           }
           //echo "<h1>$query_string</h1>";
           $query_string = substr($query_string, 0, strlen($query_string) - 3);
           //echo "<h1>$query_string</h1>";
         //connect database
           $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
       
             $query = mysqli_query($conn,$query_string);
             $result_count = mysqli_num_rows($query);

             
           }
       ?>
         </div>

<!-- stage -->
<div class="select-con mt-4">
           <select id="select-tags" multiple data-placeholder="Type to add stage" class="select">
           
           <option>Planing</option>
           <option>Doing</option>
           <option>Done</option>
           
       </select>
       </div>


    
             </div>
  
       <div class="buttontask-container py-5">
       <a href="add_project_admin.php" class="buttonlink"><button type="button" class="buttonMi " >Back</button></a>
       <button type="submit" class="buttonMi " >Create</button>

       </div>
</form>
</div>


 </div> 
</section>



              <?php
              require_once('../header_footer/footer.php');
                 ?>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script> 
<script src="../js/foraddtask.js"></script>

  </body>

</html>