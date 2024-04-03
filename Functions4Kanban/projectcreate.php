<?php
    //require section
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    
    $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());

        $admin_id = $_POST['admin_id'];
        $name = $_POST["projectName"];
        $membersArray = $_POST["members"];
        $description = $_POST["Description"];
        $detail_descrip = $_POST["Detail_Description"];
        $create_date = $_POST["createDate"];
        $due_date = $_POST["dueDate"];
        
        echo $admin_id."<br>";
        echo $name."<br>";
        echo $description."<br>";
        echo $detail_descrip."<br>";
        echo $create_date."<br>";
        echo $due_date."<br>";
        print_r($membersArray);
        $result = $projectRepo->create($admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $membersArray);
        // if ($result) {
        //   header("Location: ../pages/addProjectAdmin.php");
        //   exit();
        // } else {
        // echo "Error inserting project.";
        //} 
    // else {
    //     echo "one or more require";
    //}
?>