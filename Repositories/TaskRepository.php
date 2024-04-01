<?php
    require_once('../Models/Task.php');
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
    $query = "
        INSERT INTO ".self::$table_name." (project_id, stage_id, short_description, task_name) 
        VALUES ($project_id, 1, '$short_description', '$task_name');
    ";

    $results = $this->connection->query($query);

    if($results){
        $last_insert_id = $this->connection->insert_id;

        if(is_array($user_ids)){ // Check if $user_ids is an array
            foreach ($user_ids as $user_id) {
                $query = "
                    INSERT INTO ".taskMemberRepository::$table_name." (user_id, task_id) 
                    VALUES ($user_id, $last_insert_id);
                ";


            $results = $this->connection->query($query);
            if(!$results){
                // Handle the error or rollback the transaction if necessary
                return false;
            }
        }
        return true;
    }
    
    return false;
}
}   

        public function toModel($obj){
            $task = null;
            if($obj)
                $task = new Task($obj->id, $obj->project_id, $obj->stage_id, $obj->short_description, $obj->task_name);
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