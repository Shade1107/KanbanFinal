<?php
    require_once('../Models/User.php');
    require_once('../Database/DatabaseConnection.php');
    require_once('RoleRepository.php');
    require_once('GenderRepository.php');

    class UserRepository{
        public static $table_name = "users";
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;        
        }

        public function getAll(){
            $users = [];
            $query = "SELECT * FROM ". self::$table_name . ";";

            $results = $this->connection->query($query);
            if($results){
                while($row = mysqli_fetch_object($results)){
                    $users[] = $this->toModel($row);
                }
            }
            return $users;
        }

        public function find($id){
            $user   = null;
            $query  = "SELECT * FROM ".self::$table_name." WHERE id = $id;";
            $result = $this->connection->query($query);
            if($result) $user = $this->toModel(mysqli_fetch_object($result));
            return $user;
        }

        public function delete($id){
            $query  = "DELETE FROM ".self::$table_name." WHERE id = $id limit 1;";
            $result = $this->connection->query($query);
            return true;
        }

        public function create($name, $email, $password, $gender_id){
            $query = "
                        INSERT INTO ".self::$table_name." (id, img, name, email, password, gender_id, role_id) 
                        values (null, 'default.jpg', '$name', '$email', '$password', $gender_id, 2);
                    ";
            $results = $this->connection->query($query);
            return true;
        }

        public function update($id, $img, $name, $email, $password, $gender_id, $role_id){
            $query = "
                        UPDATE ".self::$table_name."
                        SET img = '$img', name = '$name', email = '$email', password = '$password', gender_id = '$gender_id', role_id = $role_id
                        WHERE id = $id
                    ";
            $result = $this->connection->query($query);
            return true;
        }

        public function toModel($obj){
            $user = null;
            if($obj)
                $user = new User($obj->id, $obj->img, $obj->name, $obj->email, $obj->password, $obj->gender_id, $obj->role_id);
            return $user;
        }

        public static function getUserRole($user){
            $roleRepo = new RoleRepository();
            return $roleRepo->find($user->role_id);
        }

        public static function getUserGender($user){
            $genderRepo = new GenderRepository();
            return $genderRepo->find($user->gender_id);
        }
    }
?>  