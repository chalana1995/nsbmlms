<?php

$username=htmlentities($_POST['username']);
$password = htmlentities($_POST['password']); 
if(empty($username) || empty($password))
{
	die('Enter username and password');
}

$host='localhost';

$connect=mysqli_connect($host,'root','','login');

//to prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($connect,$username);
$password = mysqli_real_escape_string($connect,$password);



$sql = mysqli_query($connect,"SELECT * FROM user WHERE username='$username' && password='$password'");
	
if($sql){
	$row=mysqli_fetch_array($sql);
		if($row['username']==$username && $row['password']==$password){
			echo "<center><h2><a href='#'>Login Success!!<a></h2></center>";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			setcookie("user",$username,time()+(60*60*60*2),"/");
			setcookie("password",$password,time()+(60*60*60*2),"/");
			header("refresh:0.2 ; url=home.php");
			}
		else{
			echo "<center><h2>Login Failed!!</h2></center>";
			 //echo "Login Failed!";
			 //exit();
			header("refresh:0.2 ; url=login.php");	
			} 
	}
else{
	echo "Login Failed Database Error!";
	exit();
	}
?>
