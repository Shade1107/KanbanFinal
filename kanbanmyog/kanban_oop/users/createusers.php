<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $userRepo = new UserRepository(DatabaseConnection::getInstance());

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender_id = $_POST['gender_id'];

    $result = $userRepo->create($name, $email, $password, $gender_id);
    if($result){
        header("Location: users.php");
    }
?>