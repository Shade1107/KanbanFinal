<?php 
require_once('../header_footer/header.php');
// include('DB_connection.php');
// require_once('header&footer/footer.php');

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
    <div class="container-fluid row">
    <div class="col-lg-7 YloginImg ee92a9">
   <!-- image -->
      </div>

      <!-- form -->
    <div class="Miprojectform  col-lg-6 ee92a9 mt-5">
        <form>
            <h1 class="loginFormText">⟁ Add Project</h1>

             <!-- <span class="Yloginspan">Welcome to our Kanban</span> -->
        <div class="Yinputfieldcenter ">
              <div class="mt-5 Miinput">   
                  <input type="text" id="" class="Miinput-field mt-3-" placeholder="add project"><br>
                
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

                  <button type="button" class="buttonMi mt-5"><a class="buttonlink" href="addProjectAdmin.php">Back</a></button>
                   <button type="button" class="buttonMi mt-5"><a class="buttonlink" href="addProjectAdmin.php">Create</a</button>
                  
                </div>
        
        </div>  
       
        
        
        
        
      </form>

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
