<!-- 




//This is just a page i want to save the data is the other page this page is useless




<?php
    require_once("../Database/DatabaseConnection.php");
?>
<?php
    $project_id = $_GET['id']?? '2';

    $conn = DatabaseConnection::getInstance();
    $query = "select s.name stage, count(t.id) count 
                from stages s
                left join tasks t on t.stage_id  = s.id
                WHERE t.project_id = '$project_id' AND s.project_id = '$project_id'
                group by s.id
            ";

    $result = $conn->query($query);
    $stages = [];
    while($row = mysqli_fetch_assoc($result)){
        $stages[] = $row;
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Chart JS Pie Chart</title>
        <link rel='stylesheet' href='style.css' type='text/css' />
        <style>
            div.d-350{
                width: 350px !important;
                height: 350px !important;
                margin: auto;
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="phppot-container">

            <div class="d-350">
                <canvas id="pie-chart"></canvas>
            </div>

            <div class="d-350">
                <canvas id="bar-chart"></canvas>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

        <script>
            let labels = [];
            let data = [];
            <?php  foreach($stages as $s): ?>

                labels.push("<?=$s["stage"]?>");
                data.push("<?=$s["count"]?>");

            <?php endforeach; ?>

            new Chart(document.getElementById("pie-chart"), {
                type : 'pie',
                data : {
                    labels : labels,
                    datasets : [ {
                        data : data
                    } ]
                },
                options : {
                    title : {
                        display : true,
                        text : 'Chart JS Pie Chart Example'
                    }
                }
            });

            new Chart(document.getElementById("bar-chart"), {
            	type : 'bar',
            	data : {
            		labels : labels,
            		datasets : [ {
                        label: 'User Count By Role',
            			data : data
            		} ]
            	},
            	options : {
            		title : {
            			display : true,
            			text : 'Chart JS Pie Chart Example'
            		}
            	}
            });
        </script>
    </body>
</html> -->