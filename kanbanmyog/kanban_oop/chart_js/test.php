//This is useful page
<?php
    // function getPieBarChartData($project_id){
    //     $conn = DatabaseConnection::getInstance();
    //     $query = "select s.name stage, count(t.id) count 
    //                 from stages s
    //                 left join tasks t on t.stage_id  = s.id
    //                 WHERE t.project_id = '$project_id' AND s.project_id = '$project_id'
    //                 group by s.id
    //             ";
    
    //     $result = $conn->query($query);
    //     $stages = [];
    //     while($row = mysqli_fetch_assoc($result)){
    //         $stages[] = $row;
    //     }
    //     return $stages;
    // }
?>