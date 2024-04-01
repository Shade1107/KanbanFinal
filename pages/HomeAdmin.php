<?php 
$isAdmin = true;

require_once('../header_footer/header.php');
require_once("../Database/DatabaseConnection.php");
require_once("../Repositories/StageRepository.php");
require_once("../Repositories/TaskRepository.php");
  
$taskRepo  =  new TaskRepository(DatabaseConnection::getInstance());
$stageRepo =  new StageRepository(DatabaseConnection::getInstance());
$tasks     =  $taskRepo  -> getAll();
$stages    =  $stageRepo -> getAll();
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
 <body>
 <section class="column-container row">
<?php
  foreach($tasks as $t): ?>
  <div class="col-lg-3 col-md-3 col-sm-3">
    <div class="task-column" id="<?=$t->getStage()->name?>">
        <h4 class="text-center"><?=$t->getStage()->name?></h4>
        <hr class="custom-hr">
        <div class="task-list" ondrop="drop(event)" ondragover="allowDrop(event)" id="tasklist<?=$t->id?>">
        <div class="task-container YDefaultCardBorder" draggable="true" ondragstart="drag(event)" id="tasklist<?=$t->id?>"  >
        <div class="task-header YPrimaryTaskColor">
        <div class="titleDeletIconDiv">
        <h5><?=$t->task_name?></h5>
        <p><i class="fa-solid fa-xmark" type="button" class="btn btn-primary" id="custom-alert-button"  data-toggle="modal" data-target="#modal<?=$t->id?>"></i></p>
                              <div class="modal fade" id="modal<?=$t->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content ">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="<?=$t->task_name?>"><?=$t->task_name?></h5>
                                      <button type="button" class="close YmodelCancelButton" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Do you Want to Delete This Task?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="button" data-dismiss="modal">Cancel</button>
                                      <button type="button" class="button" onclick="Delete(this)">Delete</button>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                      <!--  -->
                    </div>
                    <div class="d-flex">
                    <div class="canvas-container">
                          <div class="candiv">
                              <canvas id="canvas1" width="25" height="25" class="canvas canvas1" data-color="#d16bca" data-cand="cand1"  onclick="changecolor(this)"></canvas>
                              <div class="YCanvasExtra YFirstExtra">1st Priority</div>
                            </div>
                          <div class="candiv" >
                              <canvas id="canvas2" width="25" height="25" class="canvas canvas2" data-color="#795ce0" data-cand="cand2"  onclick="changecolor(this)"></canvas>
                              <div class="YCanvasExtra YSecondExtra">2nd Priority</div>
                          </div> 
                          <div class="candiv" >
                              <canvas id="canvas3" width="25" height="25" class="canvas canvas3" data-color="#30d1d9" data-cand="cand3"  onclick="changecolor(this)"></canvas>
                              <div class="YCanvasExtra YThirdExtra">3rd Priority</div>
                          </div>
                        </div>
                        <div class="YsmallProfile" >
                          <div class="YsmallPS YsmallP1">
                            <img src="../image/p1.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP2">
                            <img src="../image/p2.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallP3">
                            <img src="../image/p3.jpg"/>
                          </div>
                          <div class="YsmallPS YsmallPExtra"></div>
                        </div>
                    </div>
                </div>
                <div class="task-description-container">
                  <p><td><?=$t->short_description?></td></p>
                  <a href="#" class="">Details</a>
                </div>
              </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="js/app.js"></script> -->
    <script src="../js/changecolor.js"></script>
    <script src="../js/lightbox.js"></script>

    <?php 
    $isAdmin = true;
     require_once('../header_footer/footer.php');
    ?>
  </body>
</html>

  <!-- <tr>
      <td><?=$t->id?></td>
      <td><?=$t->getPjName()->name?></td>
      <td><?=$t->getStage()->name?></td>
      <td><?=$t->short_description?></td>
      <td><?=$t->task_name?></td>
      <td>
          <a href="deletetasks.php?id=<?=$t->id?>">
              <button>Delete</button>
          </a>
          <a href="updatetaskspage.php?id=<?=$t->id?>">
              <button>update</button>
          </a>
      </td>
  </tr> -->
