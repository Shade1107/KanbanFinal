<?php 
require_once('../header_footer/header.php');
// include('DB_connection.php');
// require_once('header&footer/footer.php');

?>
<!-- <!Doctype html>
<head>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="../image/png" href="image/logo.PNG">

  

 </head>  
 <body class="YHomeBodyColor">
 
    <div class="container-fluid row">
    <div class="col-lg-7 YloginImg ee92a9">
   
      </div>

  <!-- form -->
    <div class="Miprojectform  ee92a9 mt-5">
        <form action="" method="GET" name="">
            <h1 class="loginFormText">⟁ Add Task</h1>

        <div class="Yinputfieldcenter">
              <div class="mt-5 Miinput">
                
              <!-- task name -->
             <input type="text" id="" class="Miinput-field" placeholder="add task"><br>

               <!-- add member -->
              <div class="addmember">  
              <table class="searchtable">
                  <tr>
                  <td><i class="fa-solid fa-magnifying-glass searchicon"></i></td>
                  
                  <td><input type="text" name="k" placeholder="search member to add" autocomplete="off" class="inputsearch mt-4 "></td>
                  
                  <td><input type="submit" name="" value="search" class="mt-4 buttonsearch"></td><br>

                  </tr>
                </table>   
            <?php 
             //check to see if the keyword will provided
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
            
              $query_string = substr($query_string, 0, strlen($query_string) - 3);
             
             //connect database
              $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
           
                $query = mysqli_query($conn,$query_string);
                $result_count = mysqli_num_rows($query);

                //check to see is any results were returned
                if($result_count > 0){
                  
                 
                  echo '<select id="tselect"  multiple placeholder="search member to add">';
                  while($row = mysqli_fetch_assoc($query)){
                             
                    echo'  <option value='.$row['id'].'>'.$row['name'].'</option>';
                 
                  }
                  echo '</select>';
                  echo '<div></table>';
                }

              
                else
                echo "No result found! Please search something else.";
              }
          
            ?>
            </div>
            
             <!-- discription -->
             <textarea placeholder="detail description..." class="Mitext_area mt-4" ></textarea>

<!-- create date -->
              <div class="datecontainer">
                  <div class="input-group mt-4 ">
                    <span class="input-group-text" id="basic-addon3">Choose your create date</span>
                    <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                  </div>
              </div>
                
               <!-- target date -->   
               <div class="datecontainer">        
                  <div class="input-group mt-4" >
                      <span class="input-group-text" id="basic-addon3">Choose your target date</span>
                      <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                  </div>
                </div>  


                  <!-- Priorty color -->
               <div class="Micolorcontainer mt-4">
                <div class="Micolortext">
                Choose your Priorty color :
                </div>  

               <div class="d-flex">
                        <!-- <div class="canvas-containerMi ">
                          <div class="candivMi" id="cand1"><span>1st </span>
                              <canvas id="canvas1" width="40" height="40" class="canvas " data-color="#d16bca" data-cand="cand1"></canvas>
                          </div> 
                          <div class="candivMi" id="cand2"><span>2nd </span>
                              <canvas id="canvas2" width="40" height="40" class="canvas " data-color="#795ce0" data-cand="cand2"></canvas>
                          </div>
                          <div class="candivMi" id="cand3"><span>3rd </span>
                              <canvas id="canvas3" width="40" height="40  " class="canvas " data-color="#30d1d9" data-cand="cand3"></canvas>
                          </div>

                        </div> -->


                        <div class="canvas-container ">
                          <div class="candiv" >
                              <canvas id="canvas1" width="25" height="25" class="canvas canvas1" data-color="#edacc5" data-cand="cand1"></canvas>
                              <div class="YCanvasExtra YFirstExtra">1st Priority</div>
                            </div>
                          <div class="candiv" >
                              <canvas id="canvas2" width="25" height="25" class="canvas canvas2" data-color="#b4b8fc" data-cand="cand2" ></canvas>
                              <div class="YCanvasExtra YSecondExtra">2nd Priority</div>
                          </div> 
                          <div class="candiv" >
                              <canvas id="canvas3" width="25" height="25" class="canvas canvas3" data-color="#fab5b5" data-cand="cand3" ></canvas>
                              <div class="YCanvasExtra YThirdExtra">3rd Priority</div>
                          </div>
                        </div>                                                             
              </div>
              <!-- button -->
              <button type="button" class="buttonMi mt-4" ><a class="buttonlink" href="../HomeAdmin.php">Back</a></button>
              <button type="button" class="buttonMi mt-4" ><a class="buttonlink" href="../HomeAdmin.php">Create</a></button>
        </div>
        
          
       
        
      <!-- <span class="Yloginspan mt-3">Create a <a href="" class="YColor3e306b">NEW ACCOUNT ?</a></span> -->
        
        
        
      
      </form>

   </div>
   </div>

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
var settings = {
  plugins: ['remove_button'],
  persist: false,
  createOnBlur: true,
  create: false
};
new TomSelect('#tselect',settings);
</script>
  </body>
</html>