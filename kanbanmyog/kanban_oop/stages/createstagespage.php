<?php
    //require section
    require_once("../Repositories/StageRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
	$project_id = $_GET['id']?? '3';
?>
<body>

	<form action="createstages.php" method="post">

		<input type="text" id="project_id" name="project_id" value="<?php echo $project_id ?>" hidden><br>
		
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br>
        
		<input type="submit" value="Submit">
	</form>
</body>

</html>
