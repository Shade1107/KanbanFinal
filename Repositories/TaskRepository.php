<?php
    require_once('../Models/Task.php');
    require_once('../Models/Stage.php');
    require_once('../Database/DatabaseConnection.php');
    require_once('ProjectRepository.php');
    require_once('StageRepository.php');
    require_once('Task_memberRepository.php');

    class TaskRepository{
        public static $table_name = "tasks";
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;        
        }

        public function assignStage(Task $task, Stage $stage){

            $query  = "UPDATE " .self::$table_name. " SET stage_id = '$stage->id' WHERE id = $task->id";
            $result = $this->connection->query($query);

            if($result === false){
                throw new Exception(mysqli_error($this->connection), -1);
            }else{
                $task       = TaskRepository::find($task->id);
            }
            return $task;
        }

        public function getAll(){
            $tasks = [];
            $query = "SELECT * FROM ". self::$table_name . ";";

            $results = $this->connection->query($query);
            if($results){
                while($row = mysqli_fetch_object($results)){
                    $tasks[] = $this->toModel($row);
                }
            }
            return $tasks;
        }

        public function find($id){
            $task   = null;
            $query  = "SELECT * FROM ".self::$table_name." WHERE id = $id;";
            $result = $this->connection->query($query);
            if($result) $task = $this->toModel(mysqli_fetch_object($result));
            return $task;
        }

        public function delete($id){
            $query  = "DELETE FROM ".self::$table_name." WHERE id = $id limit 1;";
            $result = $this->connection->query($query);
            return true;
        }

        public function create($project_id, $short_description, $task_name, $user_ids){
            // Escape inputs to prevent SQL injection
            $project_id = $this->connection->real_escape_string($project_id);
            $short_description = $this->connection->real_escape_string($short_description);
            $task_name = $this->connection->real_escape_string($task_name);
        
            // Perform the main task insertion
            $query = "INSERT INTO " . self::$table_name . " (project_id, stage_id, short_description, task_name, task_priority_color, task_priority_border)  
                          VALUES ('{$project_id}', 1, '{$short_description}', '{$task_name}','YPrimaryTaskColor', 'YDefaultCardBorder')";
        
            $results = $this->connection->query($query);
        
            // Check for errors
            if(!$results){
                // Handle the error or log it
                echo "Error inserting task: " . $this->connection->error;
                return false;
            }
        
            // Get the ID of the last inserted task
            $last_insert_id = $this->connection->insert_id;
        
            // Insert task members
            foreach ($user_ids as $user_id) {
                //user_id to prevent SQL injection
                $user_id = $this->connection->real_escape_string($user_id);
        
                // Insert task member
                $query = "INSERT INTO " . TaskMemberRepository::$table_name . " (user_id, task_id) 
                              VALUES ('{$user_id}', '{$last_insert_id}')";
        
                $results = $this->connection->query($query);
        
                // Check for errors
                if(!$results){
                    echo "Error inserting task member: " . $this->connection->error;
                    return false;
                }
            }
        
            return true;
        }   

        public function toModel($obj){
            $task = null;
            if($obj)
                $task = new Task($obj->id, $obj->project_id, $obj->stage_id, $obj->short_description, $obj->task_name, $obj->task_priority_color, $obj->task_priority_border);
            return $task;
        }

        public static function getTaskStage($task){
            $stageRepo = new StageRepository();
            return $stageRepo->find($task->stage_id);
        }

        public static function getProjectName($task){
            $projectRepo = new ProjectRepository(DatabaseConnection::getInstance());
            return $projectRepo->find($task->project_id);
        }
    }
?>  