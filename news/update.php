<?php
	require 'config.php';
	$id = 0;$heading="";$summertext="";
	if(!isset($_GET["id"])){
		header("location:index.php");
	}
	else{
		$id = $_GET["id"];
		//echo "<pre>";print_r($GLOBALS);echo "</pre>";
		$query = "select * from test where id=$id";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					$heading = $row["heading"];
					$summertext = $row["summertext"];
                }
			
            }
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>News Site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="summernote.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="summernote.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">News Site</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="home.php">Insert Data</a></li>
            <li><a href="viewdata.php">view Data</a></li>
            <li><a href="listdata.php">List Data</a></li>
            <li><a href="#">category 3</a></li>
            <li class="active"><a href="update.php">Update</a></li>
        </ul>
    </div>
</nav>
<div class="container">
   <!-- <center><h1> <span class="label label-default">Summernote data formatter</span></h1></center>-->
    <form name="summernote" method="post" action="updateNews.php">
		<input type="hidden" value="<?php echo $id;?>" name="id">
		News Headline:<br/><input type="text" class="form-control" name="heading" value="<?php echo $heading;?>" /><br/>
        News Body:<br/><textarea name="newsbody" id="summernote" class="summernote"><?php echo $summertext;?></textarea><br/>
        <input type="submit" class="btn btn-success" value="Update News"/>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
</body>
</html>