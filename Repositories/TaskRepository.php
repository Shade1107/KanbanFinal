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

        public function create($project_id, $short_description, $task_name, $user_id){
            $query = "
                INSERT INTO ".self::$table_name." (id, project_id, stage_id, short_description, task_name) 
                VALUES (null, $project_id, 1, '$short_description', '$task_name');
            ";
        
            $results = $this->connection->query($query);

            $last_insert_id = $this->connection->insert_id;
        
            foreach ($user_id as $u) {
                $query = "
                    INSERT INTO ".taskMemberRepository::$table_name." (id, user_id, task_id) 
                    VALUES (null, $u, $last_insert_id);
                ";
        
                $results = $this->connection->query($query);
            }
            return true;
        }

        public function update($id, $project_id, $stage_id, $short_description, $task_name){
            $query = "
                        UPDATE ".self::$table_name."
                        SET project_id = $project_id, stage_id = $stage_id, short_description = $short_description, task_name = $task_name 
                        WHERE id = $id
                    ";
            $result = $this->connection->query($query);
            return true;
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