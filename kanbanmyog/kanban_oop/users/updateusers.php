<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $userRepo = new UserRepository(DatabaseConnection::getInstance());

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender_id = $_POST['gender_id'];
    $role_id = $_POST['role_id'];

    $img_name = $_FILES['imag']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];


    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $img = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'uploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $result = $userRepo->update($id, $img, $name, $email, $password, $gender_id, $role_id);
            if($result){
                header("Location: users.php");
            }
        }
    }
?>