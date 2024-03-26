<?php 
$isMember = true;
require_once('header&footer/header.php');

?>
<!Doctype html>
<head>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css  -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="image/logo.PNG">



 </head>
 <body class="YHomeBodyColor">

  

    <section class="column-container">
          <div class="task-column "   id="planning">
            <h4 class="text-center"> Planning</h4>
            <hr class="custom-hr" />
            <div class="task-list" ondrop="drop(event)" ondragover="allowDrop(event)" id="tasklist1">
              <!-- id must be change  -->
            <div class="task-container YDefaultCardBorder" draggable="true"   ondragstart="drag(event)" id="task1">
                    <div class="task-header YPrimaryTaskColor">
                      <div class="titleDeletIconDiv">
                        <h5>Default Task color</h5>
                        
                    </div>
                    <div class="d-flex">
                        <div class="canvas-container ">
                          
                        </div>
                        <div class="YsmallProfile" >
                          <div class="YsmallPS YsmallP1">
                            <img src="image/p1.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP2">
                            <img src="image/p2.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP3">
                            <img src="image/p3.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallPExtra"></div>
                        </div>
                    </div>
                </div>
                <div class="task-description-container">
                  <p>The submit button has stopped working since the last release.</p>
                  <a href="#" class="">Details</a>
                </div>
              </div>
              <div class="task-container YFirstCardBorder" draggable="true" ondragstart="drag(event)" id="task2">
                    <div class="task-header YfirstPriority">
                      <div class="titleDeletIconDiv">
                        <h5>First Priority</h5>
                        
                    </div>
                    <div class="d-flex">
                    <div class="canvas-container ">
                        
                        </div>
                        <div class="YsmallProfile" >
                          <div class="YsmallPS YsmallP1">
                            <img src="image/p1.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP2">
                            <img src="image/p2.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP3">
                            <img src="image/p3.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallPExtra"></div>
                        </div>
                    </div>
                </div>
                <div class="task-description-container">
                  <p>The submit button has stopped working since the last release.</p>
                  <a href="#" class="">Details</a>
                </div>
              </div>
              

              <div class="task-container YSecondCardBorder" draggable="true" ondragstart="drag(event)" id="task3">
                    <div class="task-header YsecondPriority">
                      <div class="titleDeletIconDiv">
                        <h5>Second Priority</h5>
                      
                    </div>
                    <div class="d-flex">
                    <div class="canvas-container ">
                         
                        </div>
                        <div class="YsmallProfile" >
                          <div class="YsmallPS YsmallP1">
                            <img src="image/p1.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP2">
                            <img src="image/p2.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP3">
                            <img src="image/p3.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallPExtra"></div>
                        </div>
                    </div>
                </div>
                <div class="task-description-container">
                  <p>The submit button has stopped working since the last release.</p>
                  <a href="#" class="">Details</a>
                </div>
              </div>

       
              <div class="task-container YThirdCardBorder" draggable="true" ondragstart="drag(event)" id="task4">
                    <div class="task-header YthirdPriority">
                      <div class="titleDeletIconDiv">
                        <h5>Third Priority</h5>
                        
                    </div>
                    <div class="d-flex">
                    <div class="canvas-container ">
                          
                        </div>
                        <div class="YsmallProfile" >
                          <div class="YsmallPS YsmallP1">
                            <img src="image/p1.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP2">
                            <img src="image/p2.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP3">
                            <img src="image/p3.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallPExtra"></div>
                        </div>
                    </div>
                </div>
                <div class="task-description-container">
                  <p>The submit button has stopped working since the last release.</p>
                  <a href="#" class="">Details</a>
                </div>
              </div>

              
        </div>
      </div>
    

      <div class="task-column"   id="doing">
      <h4 class="text-center"> Doing Task</h4>
        <hr class="custom-hr" />
        <div class="task-list" ondrop="drop(event)" ondragover="allowDrop(event)" id="tasklist2">
        
        </div>
      </div>

      <div class="task-column"   id="done">
      <h4 class="text-center"> Done</h4>
        <hr class="custom-hr" />
        <div class="task-list" ondrop="drop(event)" ondragover="allowDrop(event)" id="tasklist3">
        
        </div>
      </div>
    </section>

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




    <!-- <script src="js/app.js"></script> -->
    <script src="js/changecolor.js"></script>
    <script src="js/lightbox.js"></script>
   
    <?php 
     require_once('header&footer/footer.php');
    ?>

  </body>
</html>
