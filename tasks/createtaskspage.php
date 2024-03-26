<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Repositories/Project_memberRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php

	$project_id = 2;

    $projectMemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $projectMembersProjectId = $projectMemberRepo->findWithProjectID($project_id);

    $projectmember_id = array();

    foreach($projectMembersProjectId as $p){
        $user_id = $p->user_id;
        $projectmember_id[] = $user_id; 
    }

    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    $users = $userRepo->getAll();
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Create Task
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

	<form action="createtasks.php" method="post">

		<input type="text" id="project_id" name="project_id" value="<?php echo $project_id ?>" hidden><br>
		
		<label for="short_description">Short Description:</label>
		<textarea id="short_description" name="short_description" required></textarea><br>
		
		<label for="task_name">Task Name:</label>
		<textarea id="task_name" name="task_name" required></textarea><br>
		
		<div class="multipleSelection">
			<div class="selectBox" onclick="showCheckboxes()">
				<select>
					<option>Choose Task Member</option>
				</select>
				<div class="overSelect"></div>
			</div>

			<div id="checkBoxes">
                <?php foreach ($users as $u): ?>
                    <?php if (in_array($u->id, $projectmember_id)) { ?>
                        <label for="user<?=$u->id?>">
                            <input type="checkbox" name="user_id[]" value="<?=$u->id?>" id="user<?=$u->id?>" />
                            <?=$u->name?>
                        </label>
                    <?php } ?>
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
