<?php
require 'config.php';
//echo "<pre>";print_r($GLOBALS);echo "</pre>";

if(!isset($_POST["heading"]) && !isset($_POST["newsbody"]) && !isset($_POST["id"])){header("location:index.php");}
else{
	$id = $_POST["id"];
	$new_time = date("Y-m-d H:i:s", strtotime('+4 hours'));
	$heading = $_POST['heading'];
	$summertext=$_POST['newsbody'];
	
	$query = "update test set heading='$heading',summertext='$summertext',IsUpdated=true,LastUpdated='$new_time' where id=$id";
	mysqli_query($conn, $query);
	//echo "<pre>";print_r($GLOBALS);echo "</pre>";
	header("location:index.php");
}

?>