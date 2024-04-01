<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" />
</head>
<style>
  				                
body{
  margin-top:20px;
}
.avatar{
width:200px;
height:200px;
border: 1px solid white;
border-radius: 50%;
}
#edit{
  text-decoration: none;
  color: lightcyan;
}
.btn-custom{
  border: 1px solid black;
  background-color: #79305a;
}

</style>

<body>
<?php
    require_once '../Database/DatabaseConnection.php';
    require_once '../Repositories/UserRepository.php';
    require_once '../Repositories/RoleRepository.php';
    require_once '../Repositories/GenderRepository.php';

    
    // Establish the database connection
    $connection = new DatabaseConnection();
    
    // Get the user ID from the URL parameter
    $id = isset($_GET['id']) ? intval($_GET['id']) : 1;
    
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    // Find the user with the specified ID
    $user = $userRepo->find($id);
 

    ?>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">View Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">        
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" value="<?php echo $user->name; ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" value="<?php echo $user->email; ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" value="<?php echo $user->password; ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Role:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" value="<?php echo $user->role_id == 1 ? 'Admin' : 'Member'; ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" value="<?php echo $user->gender_id == 1 ? 'Male' : 'Female'; ?>" readonly>
          </div>
        </div>
        </form>
      </div>
  </div>

</div>
	
	<!-- This is link of adding small images
		which are used in the link section -->
	<script src="https://kit.fontawesome.com/704ff50790.js"
			crossorigin="anonymous">
	</script>
  <div class="row">
  <div class="col-md-6">
    <a href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#79305a" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
</svg></a>
  </div>
  <div class="col-md-6 text-end">
    <a href="" id="edit" class="btn btn-custom"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#c28c9f" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>Edit</a>
  </div>
</div>
</body>

</html>
