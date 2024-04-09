<?php
        $id = intval($_POST["id"]);
        $user = new stocks();
        $user->id = $id;

        $old_stock = stocks::find($id);
        $old_name = $old_stock->name;
        $old_balance = $old_stock->balance;
        $old_price = $old_stock->price;
        $user->name = $_POST["name"];
        $user->balance = $_POST["balance"];
        $user->price = $_POST["price"];
    
        $result = $user->update();
        if ($result) {
            // Insert into update_stock table
            $upd = new save_date();
            $upd->id = $id;
            $upd->name = $old_name;
            $upd->last_balance = $old_balance;
            $upd->price = $old_price;
            $result = $upd->create($upd);
            if ($result) {
                echo "<p>Stock updated successfully.</p>";
                header("Location: stock.php");
                exit(); // Terminate the script after redirection
            } else {
                echo "<p>Error creating update record.</p>";
            }
        } else {
            echo "<p>Error updating stock.</p>";
        }
    
?>