<?php 
session_start();
$emailError = isset($_SESSION['emailError']) ? $_SESSION['emailError'] : ''; 
unset($_SESSION['emailError']);
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Create User
	</title>
</head>

<body>
    <form action="createusers.php" method="post">
        <!-- Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" require><br>
		<?php if (isset($emailError)) echo '<div style="color:red;">'.$emailError.'</div>';?>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <!-- Gender -->
        <label for="gender">Gender:</label>
        <select id="gender" name="gender_id" required>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select><br>
        
        <input type="submit" name="signup" id="signup" value="Register">
    </form>
</body>

</html>
