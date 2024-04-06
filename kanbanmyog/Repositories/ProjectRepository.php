<?php
    require_once('../Models/Project.php');
    require_once('../Database/DatabaseConnection.php');
    require_once('UserRepository.php');
    require_once('Project_memberRepository.php');

    class ProjectRepository{
        public static $table_name = "projects";
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;        
        }

        public function getAll(){
            $projects = [];
            $query = "SELECT * FROM ". self::$table_name . ";";

            $results = $this->connection->query($query);
            if($results){
                while($row = mysqli_fetch_object($results)){
                    $projects[] = $this->toModel($row);
                }
            }
            return $projects;
        }

        public function find($id){
            $project   = null;
            $query  = "SELECT * FROM ".self::$table_name." WHERE id = $id;";
            $result = $this->connection->query($query);
            if($result) $project = $this->toModel(mysqli_fetch_object($result));
            return $project;
        }

        public function delete($id){
            $query  = "DELETE FROM ".self::$table_name." WHERE id = $id limit 1;";
            $result = $this->connection->query($query);
            return true;
        }

        public function create($admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $users_id){
            $query = "
                INSERT INTO ".self::$table_name." (id, admin_id, name, description, detail_descrip, create_date, due_date) 
                VALUES (null, '{$admin_id}', '{$name}', '{$description}', '{$detail_descrip}', '{$create_date}', '{$due_date}')
            ";
        
            $results = $this->connection->query($query);
            // var_dump($results);

            $last_insert_id = $this->connection->insert_id;
            // var_dump($last_insert_id);
            
            foreach ($users_id as $u) {
                $u = $this->connection->real_escape_string($u);
                $query = "
                    INSERT INTO ".projectMemberRepository::$table_name." (id, user_id, project_id) 
                    VALUES (null, '{$u}', '{$last_insert_id}')
                ";
                $results = $this->connection->query($query);
            }
        
            return true;
        }

        public function update($id, $admin_id, $name, $description, $detail_descrip, $create_date, $due_date, $completed_date){
            $query = "
                        UPDATE ".self::$table_name." 
                        SET admin_id = $admin_id, name = $name, description = $description, detail_descrip = $detail_descrip,
                        create_date = $create_date, due_date = $due_date, completed_date = $completed_date
                        WHERE id = $id
                    ";
            $result = $this->connection->query($query);
            return true;
        }

        public function toModel($obj){
            $project = null;
            if($obj)
                $project = new Project($obj->id, $obj->admin_id, $obj->name, $obj->description, $obj->detail_descrip, $obj->create_date, $obj->due_date, $obj->completed_date);
            return $project;
        }

        public static function getAdminName($project){
            $userRepo = new UserRepository(DatabaseConnection::getInstance());
            return $userRepo->find($project->admin_id);
        }

        function getPieBarChartData($project_id){
            $query = "select s.name stage, count(t.id) count 
                        from stages s
                        left join tasks t on t.stage_id  = s.id
                        WHERE t.project_id = '$project_id' AND s.project_id = '$project_id'
                        group by s.id
                    ";
        
            $result = $this->connection->query($query);
            $stages = [];
            while($row = mysqli_fetch_assoc($result)){
                $stages[] = $row;
            }
            return $stages;
        }
        public function findWithMemberID($id){
            $taskMembers   = [];
            $query  = "SELECT * FROM ".self::$table_name." WHERE user_id = $id;";

            $results = $this->connection->query($query);
            if($results) {
                while($row = mysqli_fetch_object($results)){
                    $taskMembers[] = $this->toModel($row);
                }
            }
            return $taskMembers;
        }
    }

    
?>  