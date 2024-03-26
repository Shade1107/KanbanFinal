<?php
    require_once('../Models/Stage.php');
    require_once('../Database/DatabaseConnection.php');

    class StageRepository{
        public static $table_name = "stages";
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

        public function delete(Model $model){}
        public function create(Model $model){}
        public function update(Model $model){}

        public function toModel($obj){
            $stage = null;
            if($obj)
                $stage = new Stage($obj->id, $obj->name);
            return $stage;
        }
    }
?>  