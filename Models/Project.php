<?php
    require_once("Model.php");
    require_once("../Repositories/ProjectRepository.php");
    require_once("../Database/DatabaseConnection.php");

    class Project extends Model{
        public $id;
        public $admin_id;
        public $admin;
        public $name;
        public $description;
        public $detail_descrip;
        public $create_date;
        public $due_date;
        public $completed_date;
        
        public function __construct($admin_id, $name, $description, $detail_descrip, $create_date, $due_date)
        {
            $this->admin_id         = $admin_id;
            $this->admin            = ProjectRepository::getAdminName($this);
            $this->name             = $name;
            $this->description      = $description;
            $this->detail_descrip   = $detail_descrip;
            $this->create_date      = $create_date;
            $this->due_date         = $due_date;
        }

        public function getName(){
            return $this->admin;    
        }

        public static function create($project){
            $query = "
                INSERT INTO projects (admin_id, name, description, detail_descrip, create_date, due_date) 
                VALUES ('$project->admin_id', '$project->name', '$project->description', '$project->detail_descrip', '$project->create_date', '$project->due_date')
            ";
            $conn = DatabaseConnection::getInstance();
            //$result = $conn->query($query);

            //$last_insert_id = $conn->insert_id;
            $results = mysqli_query($conn,$query);

            //$last_insert_id = $this->connection->insert_id;
        
            // foreach ($user_id as $u) {
            //     $query2 = "
            //         INSERT INTO project_members (id, user_id, project_id) 
            //         VALUES (null, $u, $last_insert_id);
            //     ";
        
            //     $results = $conn->query($query2);
            // }
        
            return true;
        }
    }
?>