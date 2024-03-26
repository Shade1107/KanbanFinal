<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    $users = $userRepo->getAll();

	$admin_id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Create Project
	</title>

	<style>
		h1 {
			color: green;
		}

		.multipleSelection {
			width: 300px;
			background-color: #BCC2C1;
		}

		.selectBox {
			position: relative;
		}

		.selectBox select {
			width: 100%;
			font-weight: bold;
		}

		.overSelect {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
		}

		#checkBoxes {
			display: none;
			border: 1px #8DF5E4 solid;
		}

		#checkBoxes label {
			display: block;
		}

		#checkBoxes label:hover {
			background-color: #4F615E;
			color: white;
			/* Added text color for better visibility */
		}
	</style>
</head>

<body>

	<form action="createprojects.php" method="post">

		<input type="text" id="admin_id" name="admin_id" value="<?php echo $admin_id ?>" hidden><br>
		
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br>
		
		<label for="description">Description:</label>
		<textarea id="description" name="description" required></textarea><br>
		
		<label for="detail_descrip">Detail Description:</label>
		<textarea id="detail_descrip" name="detail_descrip" required></textarea><br>
		
		<label for="create_date">Create Date:</label>
		<input type="date" id="create_date" name="create_date" required><br>
		
		<label for="due_date">Due Date:</label>
		<input type="date" id="due_date" name="due_date" required><br>
		
		<label for="completed_date">Completed Date:</label>
		<input type="date" id="completed_date" name="completed_date"><br>
		
		<div class="multipleSelection">
			<div class="selectBox" onclick="showCheckboxes()">
				<select>
					<option>Choose Project Member</option>
				</select>
				<div class="overSelect"></div>
			</div>

			<div id="checkBoxes">
				<?php foreach($users as $u): ?>
					<label for="user<?=$u->id?>">
						<input type="checkbox" name="user_id[]" value="<?=$u->id?>" id="user<?=$u->id?>" />
						<?=$u->name?>
					</label>
				<?php endforeach?>
			</div>
		</div>
		
		<input type="submit" value="Submit">
	</form>

	<script>
		let show = true;

		function showCheckboxes() {
			let checkboxes = document.getElementById("checkBoxes");

			if (show) {
				checkboxes.style.display = "block";
				show = false;
			} else {
				checkboxes.style.display = "none";
				show = true;
			}
		}
	</script>
</body>

</html>
