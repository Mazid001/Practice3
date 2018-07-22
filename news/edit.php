<?php
session_start(); //start the PHP_session function 

$user = array("a"=>"123", "b"=>"123", "c"=>"123", "d"=>"123", "e"=>"123");

$flag=0;

foreach($user as $un=> $pass)
{
	if($_POST['un']== $un && $_POST['pw']== $pass)
	{
		$_SESSION['un']= $un;
		header("location:home.php");
		$flag=1;
		break;
	}
}

if($flag!=1)
{
	$_SESSION['ErrorMsg']= "Wrong Username or Password";
	header("location:login.php");
}

?>