<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>

<?php
    $userRepo = new UserRepository(DatabaseConnection::getInstance());
    $users = $userRepo->getAll();
?>
<html>
    <head>
        <title>Users</title>
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Email</th>
                <th onclick="togglePassword()">Password</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        <?php foreach($users as $u): ?>
            <tr>
                <td><?=$u->id?></td>
                <td><?=$u->img?></td>
                <td><?=$u->name?></td>
                <td><?=$u->email?></td>
                <td data-password="<?=$u->password?>">***</td>
                <td><?=$u->getGender()->name?></td>
                <td><?=$u->getRole()->name?></td>
                <td>
                    <a href="deleteusers.php?id=<?=$u->id?>">
                        <button>Delete</button>
                    </a>
                    <a href="updateuserspage.php?id=<?=$u->id?>">
                        <button>update</button>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
                
        <script>
        function togglePassword() {
            // Get all the password cells
            var passwordCells = document.querySelectorAll('td[data-password]');

            // Toggle the visibility of the password value for each password cell
            passwordCells.forEach(function(cell) {
                if (cell.textContent === '***') {
                    // Get the actual password value from the "data-password" attribute
                    var password = cell.getAttribute('data-password');
                    cell.textContent = password; // Display the actual password value
                } else {
                    cell.textContent = '***'; // Hide the password value and display asterisks
                }
            });
        }
        </script>


    </body>
</html>
