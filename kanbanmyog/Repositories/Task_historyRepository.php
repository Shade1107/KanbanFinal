<?php
    require_once('../Models/Task_history.php');
    require_once('../Database/DatabaseConnection.php');
    require_once('ProjectRepository.php');

    class TaskHistoryRepository{
        public static $table_name = "tasks_history";
        private $connection;

        public function __construct(){
            $this->connection = DatabaseConnection::getInstance();
        }
        
        public function getAll(){
            $stages = [];
            $query = "SELECT * FROM ". self::$table_name . ";";

            $results = $this->connection->query($query);
            if($results){
                while($row = mysqli_fetch_object($results)){
                    $stages[] = $this->toModel($row);
                }
            }
            return $stages;
        }

        public function find($id){
            $stage      = null;
            $query      = "SELECT * FROM ".self::$table_name." WHERE id = $id;";
            $result     = $this->connection->query($query);
            if($result) $stage = $this->toModel(mysqli_fetch_object($result));
            return $stage;
        }

        public function delete($id){
            $query  = "DELETE FROM ".self::$table_name." WHERE id = $id limit 1;";
            $result = $this->connection->query($query);
            return true;
        }

        public function create($task_id, $project_id,$details,$user_id,$currentDateTime){

            // $details = "Change the task $oldstage to $currentstage";

            date_default_timezone_set('Asia/Yangon');
            $currentDateTime = date("Y-m-d H:i:s");

            $query = "
                    INSERT INTO ".self::$table_name." (id, task_id, project_id,details,user_id,changed_date) 
                    values (null, '$task_id', '$project_id','$details','$user_id','$currentDateTime');
                    ";
            $results = $this->connection->query($query);
            return true;
        }
        
        public function update($id, $task_id){
            $query = "
                        UPDATE ".self::$table_name." 
                        SET name='$task_id'
                        WHERE id = $id
                    ";
            $result = $this->connection->query($query);
            return true;
        }

        public function toModel($obj){
            $history = null;
            if($obj)
                $history = new Stage($obj->id, $obj->name, $obj->project_id);
            return $history;
        }
        // public static function getProjectName($stage){
        //     $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
        //     return $projectRepo->find($stage->project_id);
        // }

        // public function ProjectID($id){
        //     $stages   = [];
        //     $query  = "SELECT * FROM ".self::$table_name." WHERE project_id = $id;";
        //     $result = $this->connection->query($query);
        //     if($result) {
        //         while($row = mysqli_fetch_object($result)){
        //             $stages[] = $this->toModel($row);
        //         }
        //     }
        //     return $stages;
        //   }

        //   public function findLastStageId($project_id) {
        //     // Assuming $this->connection is a MySQLi connection object
        //     $query = "SELECT MAX(id) AS last_stage_id FROM " . self::$table_name . " WHERE project_id = ?";
            
        //     // Prepare the statement to prevent SQL injection
        //     if ($stmt = $this->connection->prepare($query)) {
        //         // Bind the $project_id parameter to the query
        //         $stmt->bind_param("i", $project_id); // 'i' denotes the data type integer
                
        //         // Execute the query
        //         $stmt->execute();
                
        //         // Get the result of the query
        //         $result = $stmt->get_result();
                
        //         // Fetch data from the result set
        //         if ($row = $result->fetch_assoc()) {
        //             return $row['last_stage_id'];
        //         } else {
        //             // Handle the case where no data was found or any other error occurred
        //             return null;
        //         }
                
        //         // Close the prepared statement
        //         $stmt->close();
        //     } else {
        //         // Handle error in preparation of statement
        //         return null;
        //     }
        // }   
    }
?>  