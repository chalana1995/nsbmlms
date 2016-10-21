<?php
session_start();
// Set Session data to an empty array
$_SESSION = array();
// Expire their cookie files
if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
    setcookie("user", '', -time()+(60*60*60*2),"/");
	setcookie("password", '', -time()+(60*60*60*2),"/");
}
// Destroy the session variables
session_destroy();
// Double check to see if their sessions exists
if(isset($_SESSION['username'])){
	//header("location: message.php?msg=Error:_Logout_Failed");
	echo"<h1>Log Out Error!!</h1>";
} else {
	header("location:Home.php");
	exit();
} 
?>