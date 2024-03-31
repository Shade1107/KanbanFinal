<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JS CSS HTML Kanban Board</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="icon" type="image/png" href="image/logo.PNG">
  <style>
    body {
      background-color: #fed1dc;
    }
  </style>
</head>
<body>
  <div class="loginForm">
    <form action="func4singup.php" method="POST">
      <div class="Yinputfieldcenter">
        <h1 class="loginFormText">⟁ Kanban Board</h1>
        <h2>Create an Account</h2>
        <div class="mt-5 Yinputf">
        <input type="text" id="name" name="name" class="input-field mb-5" placeholder="Enter Your Name" value="<?=$_GET['name']??''?>">
        <input type="email" id="email" name="email" class="input-field mb-5" placeholder="Enter Email" value="<?=$_GET['email']??''?>">
        <input type="password" id="password" name="password" class="input-field-psw  mb-5" placeholder="Enter Password">
            <i class="fas fa-eye"></i>
          </div>
          <label for="gender">Gender:</label>
          <select id="gender" name="gender_id" required>
            <option value="1">Male</option>
            <option value="2">Female</option>
          </select><br>
          <button type="submit" class="button mt-1">Sign Up</button>
        </div><br><br>
        <div>Already have an account? <a href="login.php" style="text-decoration: none;">Login</a></div>
      </div>
    </form>
  </div>
</body>
</html>