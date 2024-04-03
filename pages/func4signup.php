<?php
session_start();
require_once("../Database/DatabaseConnection.php");
require_once("../Repositories/UserRepository.php");

$userRepo = new UserRepository(DatabaseConnection::getInstance());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = 2;
    $gender_id = $_POST['gender_id'];

    $conn = DatabaseConnection::getInstance();
    $table = "users";

    $check_query = "SELECT * FROM `$table` WHERE email = '$email'";
    $check_result = $conn->query($check_query);

    if ($check_result && $check_result->num_rows > 0) {
        echo  '
        <script>
            window.location.href = "signup.php";
            alert("This email already exists");
        </script>
        ';
        exit; 
    }

    $insert_query = "INSERT INTO `$table` (name, email, password, role_id, gender_id) 
              VALUES ('$name', '$email', '$password', '$role_id', '$gender_id')";
    $insert_result = $conn->query($insert_query);

    if ($insert_result) {
        $user_id = $conn->insert_id; // Get the inserted user_id
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id ;
        header("Location: addProjectMember.php");
        exit;
    } else {
        echo "Failed to insert user data.";
    }
}
?>
