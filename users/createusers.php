<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");

    $userRepo = new UserRepository(DatabaseConnection::getInstance());

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender_id = $_POST['gender_id'];

    $emailExists = $userRepo->CheckEmail($email); 
    if ($emailExists > 0){
        $emailError = 'Email already exists. Please try a different email.';
        session_start();
        $_SESSION['emailError'] = $emailError; 
        header("Location: createuserspage.php");
    } else {
        $result = $userRepo->create($name, $email, $password, $gender_id);
        if ($result) {
            header("Location: users.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            echo "There were errors in user creation.";
        }
    }
}
?>
