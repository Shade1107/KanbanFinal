<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
    $projectMemberRepo = new ProjectMemberRepository();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //$admin_id = htmlspecialchars(($_GET["id"]));
        $projectName = htmlspecialchars($_POST["projectName"]);
        $membersArray = htmlspecialchars($_POST["members"]);
        $description = htmlspecialchars($_POST["Description"]);
        $detail_description = htmlspecialchars($_POST["Detail_Description"]);
        $createDate = htmlspecialchars($_POST["createDate"]);
        $targetDate = htmlspecialchars($_POST["targetDate"]);
        
        // $project->admin_id = 2;
        // $project->name = $projectName;
        // $project->description = $description;
        // $project->detail_descrip = $detail_description;
        // $project->create_date = $createDate;
        // $project->due_date = $targetDate;
      
        $result = $projectRepo->create(6,$projectName,$description,$detail_description,$createDate,$targetDate,"null",$membersArray);
        if ($result) {
          header("Location: ../Functions4Kanban/projectcreate.php");
          exit();
        } else {
        echo "Error inserting project.";

        echo $projectName;
        print_r($membersArray);
    }
    } else {
        echo "one or more require";
    }
?>