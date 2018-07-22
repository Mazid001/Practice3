<!DOCTYPE html>
<?php $id = $_GET['id']; ?>
<html lang="en">
<head>
    <title>News Site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">News Site</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="home.php">Insert data</a></li>
            <li><a href="viewdata.php">View data</a></li>
            <li><a href="listdata.php">List Data</a></li>
            <li><a href="#">category 3</a></li>
        </ul>
    </div>
</nav>
<div class="container">
        <?php
            require 'config.php';

            $statement="select * from test where id='$id'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					$isUpdated = $row["IsUpdated"];
					$lastUpdated = $row["LastUpdated"];
                    echo "<div class='panel-group'><div class='panel panel-primary'><div class='jumbotron'><h2>".$row['heading']."</h2>";
					
					
					echo "-By Admin at <span>&nbsp;</span>";echo $row['datetime'];
					if($isUpdated == true){
					echo "<br> -Edited by Admin at <span>&nbsp;</span>" .$row['LastUpdated']."</div>";
					}
					echo "<div class='panel-body'>".$row['summertext'] ."</div></div></div>";
                }
            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
</div>
</body>
</html>