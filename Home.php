
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php
session_start();

$host='localhost';
$connect=mysqli_connect($host,'root','','login');

// Initialize some vars
$user_ok = false;
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($connect,$u,$p){
	$sql = "SELECT id FROM user WHERE username = '$u' AND password = '$p'";
    $query = mysqli_query($connect, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
}
?>
<title>Learning Mangement System</title>
<style type="text/css">

body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:11.5%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}

 /*
figure{
	background: #D7D1D1;
	color:white;
	width:100%;
	margin:.0%;
	padding:.0%;
	border-radius:7px;

 }*/

 
 #img_1{
	 width:56%;
	 height:20%;
	 margin-top:-15%;
	 opacity:1;
	 margin-bottom:-0.4%;
	 margin-left:22%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }	

#img_2{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9;
	 margin-left:1.4%;
	 margin-bottom:-0.3%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }
#img_3{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9; 
	 margin-bottom:-0.3%;
	 margin-left:22%;
	 cursor:default;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 }

.figcaption1,.figcaption2,.figcaption3{
	font-size:25px;
	background-color:#333;
	width:56%;
	color:#CCC;
	margin-top:0%;
	transition:all 0.5s;
	margin-left:22%;
	text-align:center;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 
	}
	
.figcaption1:hover,.figcaption2:hover,.figcaption3:hover{
	background-color:#CF5C3F;
	color:#FFF;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	}
.figcaption2{
	margin-left:21.8%;
	width:56.2%;
	margin-top:2px;
	
	}
h3.header{
	text-decoration:underline;
	
	}

.topleft{
		width:20%;
		float:left;
		padding:1%;
		position:absolute;
		margin-top:2%;
		box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
		/*border-bottom-color:#CCC;*/
		clear:both;
		background-color:#CEFFCE;
		border-radius:2px;	
	}	
.topleft div ul{
		list-style:none;
		margin: 0.5% -3% 2% -17%;
	}
	/*#9F9*/
.topleft div ul li {
		background-color:#CEFFCE;/*#CFF*/
		margin-top:2%;
		font-size:16px;
		padding-top:1.5%;
			
	}
.topleft div ul li::before{
	content:url(../book_tree_900px.jpg);
	margin-left:1px;
	font-weight:200;
	margin-right:2px;
	
	}

.topleft div ul li:hover{
	background-color:#00FF7F;
	color:#000;
	font-weight:bold;
	}
.topleft div ul li a{
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:100;}
	
.topleft div ul li a : hover{
	color:#000;
	font-weight:bold;
	
	}
#bottomleft{
	clear:both;
	/*border-style:outset;*/
	border-color:#CCC; 
	width:22.1%;
	margin-top:1.5%;
	position:relative;
	margin-left:0.2%;
	background-color:#F5F3EE;
	border-radius:3px;
	height:150px;
	box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
	padding-top:10px;
	}
#bottomleft div {border-radius:3px;}	

input[type=text],input[type=password]{
	width:93%;
	padding:1%;
	margin-top:5px;
	margin-bottom:1%;
	border-radius:5px;
	transition:all 1s;
	margin-left:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:300;
	}
input[type=text]:focus,input[type=password]:focus{
	background-color:#CFC;
	}
input[type=submit]{
	padding:1%;
	margin-bottom:1%;
	width:21%;
	margin-top:3%;
	transition:all 0.5s;
	float:right;
	margin-right:7px;
	background-color:#FFF;
	border:#9F6 2px solid;
	font-weight:bold;
	}
input[type=submit]:hover{
	background-color:#CFC;
	color:#000;
	font-weight:600;
	}	
video {
	float:left;
	position:relative;
	margin-top:9.5%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	background-color:#FFF;
	}
#googleMap{
	width:22%;
	height:30%;
	float:left;
	position:absolute;
	margin-top:30%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	}
	
iframe{
	float:right;
	width:22%;
	height:270px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-left:-20%;
	margin-top:-13%;
	overflow:hidden;
	}
#Contactinfo{
	width:22%;
	height:250px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	text-align:left;
	float:left;
	margin-top:7%;
	margin-right:-20%;
	background-color:#CFC;
	color:#000;
	
	}
#pgcotactinfo{
	font-family:Arial, Helvetica, sans-serif;
	margin-left:5%;
	
	
	}

#hdcontactinfo{
		margin-left:3%;
	}

#latestnews{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-8%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
	}

#latestnews ul{
	text-align:center;
	font-family:Arial, Helvetica, sans-serif;
	
	}
#latestnews ul li{padding-top:20px;
				 padding-right:10px;
				 float:left;
				}
	
/*@-webkit-keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	
	from{color:#CCC;}
	to{color:#333;}
}


@keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	from{color:#CCC;}
	to{color:#333;}
}*/


#latestnewshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

	
	
	
#upcomingevents{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-10%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
		text-align:left;
	}

#upcomingeventshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

#upcomingeventsul li{padding-top:20px;}

#footer1{
	width:100%;
	height:170px;
	
	}
#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
	
#validate1, #validate2 ,#validate3{display:inline-block;
								   margin-top:2px;
								   margin-bottom:0px;
									}
#validate2{padding-left:483px;
		   padding-right:484px;
		  }
#addidimg{display:none;}

#addidlink{display:none;}

#innerhtml{display:none;
		   margin-top:-2%;
		   margin-bottom:4px;
		   
		   }
#hideform,#hideid{display:inline;
				  display:none;
					}
#hideform{position:absolute;
		  padding:10px;
		  margin-left:93%;
		  margin-top:0%;
		 }
#hideid{
	padding:10px;
	position:absolute;
	margin-top:4px;
	margin-left:78%;
		}

@media only screen and (min-width:150px) and (max-width:600px)
{
	body{
	font-family:Verdana, Geneva, sans-serif;
	text-align:left;
	/*border:outset;*/
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:120px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:130px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:18px;
	text-align:center;
	}

#inside {
			display:none	
		}	
		
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 30px;
	width:80%;
	margin-top:14%;
	position:absolute;
	margin-left:18.8%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
	padding-bottom:5px;
	padding-top:-2px;
}

a {
	text-decoration:none;
	}
nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:0.3%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	#hide{display:none;}
nav ul{
	list-style:none;
	margin-left:-6%;
	height:38px;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}
}

@media only screen and (min-width:1350px) and (max-width:1380px){
	body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:11.5%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}

 /*
figure{
	background: #D7D1D1;
	color:white;
	width:100%;
	margin:.0%;
	padding:.0%;
	border-radius:7px;

 }*/

 
 #img_1{
	 width:56%;
	 height:20%;
	 margin-top:-15%;
	 opacity:1;
	 margin-bottom:-0.4%;
	 margin-left:22%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }	

#img_2{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9;
	 margin-left:1.4%;
	 margin-bottom:-0.3%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }
#img_3{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9; 
	 margin-bottom:-0.3%;
	 margin-left:22%;
	 cursor:default;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 }

.figcaption1,.figcaption2,.figcaption3{
	font-size:25px;
	background-color:#333;
	width:56%;
	color:#CCC;
	margin-top:0%;
	transition:all 0.5s;
	margin-left:22%;
	text-align:center;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 
	}
	
.figcaption1:hover,.figcaption2:hover,.figcaption3:hover{
	background-color:#CF5C3F;
	color:#FFF;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	}
.figcaption2{
	margin-left:21.8%;
	width:56.2%;
	margin-top:2px;
	
	}
h3.header{
	text-decoration:underline;
	
	}

.topleft{
		width:20%;
		float:left;
		padding:1%;
		position:absolute;
		margin-top:2%;
		box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
		/*border-bottom-color:#CCC;*/
		clear:both;
		background-color:#CEFFCE;
		border-radius:2px;	
	}	
.topleft div ul{
		list-style:none;
		margin: 0.5% -3% 2% -17%;
	}
	/*#9F9*/
.topleft div ul li {
		background-color:#CEFFCE;/*#CFF*/
		margin-top:2%;
		font-size:16px;
		padding-top:1.5%;
			
	}
.topleft div ul li::before{
	content:url(../book_tree_900px.jpg);
	margin-left:1px;
	font-weight:200;
	margin-right:2px;
	
	}

.topleft div ul li:hover{
	background-color:#00FF7F;
	color:#000;
	font-weight:bold;
	}
.topleft div ul li a{
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:100;}
	
.topleft div ul li a : hover{
	color:#000;
	font-weight:bold;
	
	}
#bottomleft{
	clear:both;
	/*border-style:outset;*/
	border-color:#CCC; 
	width:22.1%;
	margin-top:1.5%;
	position:relative;
	margin-left:0.2%;
	background-color:#F5F3EE;
	border-radius:3px;
	height:150px;
	box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
	padding-top:10px;
	}
#bottomleft div {border-radius:3px;}	

input[type=text],input[type=password]{
	width:93%;
	padding:1%;
	margin-top:5px;
	margin-bottom:1%;
	border-radius:5px;
	transition:all 1s;
	margin-left:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:300;
	}
input[type=text]:focus,input[type=password]:focus{
	background-color:#CFC;
	}
input[type=submit]{
	padding:1%;
	margin-bottom:1%;
	width:21%;
	margin-top:3%;
	transition:all 0.5s;
	float:right;
	margin-right:7px;
	background-color:#FFF;
	border:#9F6 2px solid;
	font-weight:bold;
	}
input[type=submit]:hover{
	background-color:#CFC;
	color:#000;
	font-weight:600;
	}	
video {
	float:left;
	position:relative;
	margin-top:9.5%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	background-color:#FFF;
	}
#googleMap{
	width:22%;
	height:30%;
	float:left;
	position:absolute;
	margin-top:30%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	}
	
iframe{
	float:right;
	width:22%;
	height:270px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-left:-20%;
	margin-top:-13%;
	overflow:hidden;
	}
#Contactinfo{
	width:22%;
	height:250px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	text-align:left;
	float:left;
	margin-top:7%;
	margin-right:-20%;
	background-color:#CFC;
	color:#000;
	
	}
#pgcotactinfo{
	font-family:Arial, Helvetica, sans-serif;
	margin-left:5%;
	
	
	}

#hdcontactinfo{
		margin-left:3%;
	}

#latestnews{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-8%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
	}

#latestnews ul{
	text-align:center;
	font-family:Arial, Helvetica, sans-serif;
	
	}
#latestnews ul li{padding-top:20px;
				 padding-right:10px;
				 float:left;
				}
	
/*@-webkit-keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	
	from{color:#CCC;}
	to{color:#333;}
}


@keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	from{color:#CCC;}
	to{color:#333;}
}*/


#latestnewshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

	
	
	
#upcomingevents{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-10%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
		text-align:left;
	}

#upcomingeventshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

#upcomingeventsul li{padding-top:20px;}

#footer1{
	width:100%;
	height:170px;
	
	}
#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
	
#validate1, #validate2 ,#validate3{display:inline-block;
								   margin-top:2px;
								   margin-bottom:0px;
									}
#validate2{padding-left:483px;
		   padding-right:484px;
		  }
	
	}
@media only screen and (min-width:1350px) and (max-width:1380px){
	body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:21%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:10.8%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}

 /*
figure{
	background: #D7D1D1;
	color:white;
	width:100%;
	margin:.0%;
	padding:.0%;
	border-radius:7px;

 }*/

 
 #img_1{
	 width:56%;
	 height:20%;
	 margin-top:-13.8%;
	 opacity:1;
	 margin-bottom:-0.4%;
	 margin-left:22%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }	

#img_2{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9;
	 margin-left:1.5%;
	 margin-bottom:-0.3%;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 cursor:default;
	 }
#img_3{
	 width:56%;
	 height:20%;
	 margin-top:5%;
	 opacity:0.9; 
	 margin-bottom:-0.3%;
	 margin-left:22%;
	 cursor:default;
	 box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 }

.figcaption1,.figcaption2,.figcaption3{
	font-size:25px;
	background-color:#333;
	width:56%;
	color:#CCC;
	margin-top:0%;
	transition:all 0.5s;
	margin-left:22%;
	text-align:center;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	 
	}
	
.figcaption1:hover,.figcaption2:hover,.figcaption3:hover{
	background-color:#CF5C3F;
	color:#FFF;
	box-shadow: 1PX 1px 2px 2px rgba(0,0,0,0.23);
	}
.figcaption2{
	margin-left:22%;
	width:56.2%;
	margin-top:2px;
	
	}
h3.header{
	text-decoration:underline;
	
	}

.topleft{
		width:20%;
		float:left;
		padding:1%;
		position:absolute;
		margin-top:2%;
		box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
		/*border-bottom-color:#CCC;*/
		clear:both;
		background-color:#CEFFCE;
		border-radius:2px;	
	}	
.topleft div ul{
		list-style:none;
		margin: 0.5% -3% 2% -17%;
	}
	/*#9F9*/
.topleft div ul li {
		background-color:#CEFFCE;/*#CFF*/
		margin-top:2%;
		font-size:16px;
		padding-top:1.5%;
			
	}
.topleft div ul li::before{
	content:url(book_tree_900px.jpg);
	margin-left:1px;
	font-weight:200;
	margin-right:2px;
	
	}

.topleft div ul li:hover{
	background-color:#00FF7F;
	color:#000;
	font-weight:bold;
	}
.topleft div ul li a{
	color:#333;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:100;}
	
.topleft div ul li a : hover{
	color:#000;
	font-weight:bold;
	
	}
#bottomleft{
	clear:both;
	/*border-style:outset;*/
	border-color:#CCC; 
	width:22.1%;
	margin-top:1.5%;
	position:relative;
	margin-left:0.2%;
	background-color:#F5F3EE;
	border-radius:3px;
	height:150px;
	box-shadow: 1PX 1px 1px 1px rgba(0,0,0,0.16);
	padding-top:10px;
	}
#bottomleft div {border-radius:3px;}	

input[type=text],input[type=password]{
	width:93%;
	padding:1%;
	margin-top:5px;
	margin-bottom:1%;
	border-radius:5px;
	transition:all 1s;
	margin-left:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-weight:300;
	}
input[type=text]:focus,input[type=password]:focus{
	background-color:#CFC;
	}
input[type=button]{
	padding:1%;
	margin-bottom:1%;
	width:21%;
	margin-top:3%;
	transition:all 0.5s;
	float:right;
	margin-right:7px;
	background-color:#FFF;
	border:#9F6 2px solid;
	font-weight:bold;
	}
input[type=submit]:hover{
	background-color:#CFC;
	color:#000;
	font-weight:600;
	}	
video {
	float:left;
	position:relative;
	margin-top:8.1%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	background-color:#FFF;
	width:22.4%;
	}
#googleMap{
	width:22%;
	height:40%;
	float:left;
	position:absolute;
	margin-top:27.5%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	}
	
iframe{
	float:right;
	width:22%;
	height:270px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-left:-20%;
	margin-top:-12%;
	overflow:hidden;
	}
#Contactinfo{
	width:22.2%;
	height:250px;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	text-align:left;
	float:left;
	margin-top:1%;
	margin-right:-20%;
	background-color:#CFC;
	color:#000;
	
	}
#pgcotactinfo{
	font-family:Arial, Helvetica, sans-serif;
	margin-left:5%;
	
	
	}

#hdcontactinfo{
		margin-left:3%;
	}

#latestnews{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-10.5%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
	}

#latestnews ul{
	text-align:center;
	font-family:Arial, Helvetica, sans-serif;
	
	}
#latestnews ul li{padding-top:20px;
				 padding-right:10px;
				 float:left;
				}
	
/*@-webkit-keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	
	from{color:#CCC;}
	to{color:#333;}
}


@keyframes example {
    from {background-color:#333;}
    to {background-color:#FFF;}
	from{color:#CCC;}
	to{color:#333;}
}*/


#latestnewshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

	
	
	
#upcomingevents{
		float:right;
		width:22%;
		height:500px;
		box-shadow: 1PX 1px 1px 1px  #99CC99;
		margin-left:-20%;
		margin-top:-18.5%;
		margin-right:0.1%;
		background-color:#FFF;
		color:#333;
		/*-webkit-animation-name: example; 
    	-webkit-animation-duration: 4s;
		animation-name: example;
   		animation-duration: 4s;
		animation-iteration-count:1;*/
		text-align:left;
	}

#upcomingeventshd{
	background-color:#008000;
	color:#CCC;
	margin-top:0%;
	height:50px;
	padding-top:10%;
	text-align:center;
	}

#upcomingeventsul li{padding-top:20px;}

#footer1{
	width:100%;
	height:170px;
	
	}
#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
	
#validate1, #validate2 ,#validate3{display:inline-block;
								   margin-top:2px;
								   margin-bottom:-2%;
									}
#validate2{padding-left:535px;
		   padding-right:535px;
		  }
#hidehide{display:none;}



	}
</style>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(6.872738, 79.883714),
    zoom:17,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
function checklog(){

	var user ="<?php echo $log_username?>";
	var check1=<?php echo $user_ok?>;

	if(check1 == true){
		document.getElementById('formdiv').style.display="none";
		document.getElementById('innerhtml').style.display="block";
		document.getElementById("innerhtml").innerHTML='&nbsp'+"You are logged in as "+user;
		document.getElementById('addidlink').style.display="block";
		document.getElementById('addidimg').style.display="block";
		document.getElementById('addidimg').src="user/"+user+".jpg";
		document.getElementById('addidlink').href="user.htm?username="+user;
		document.getElementById('hidehide').style.display="block";
		document.getElementById('inside').style.display="none";
		document.getElementById('hideid').style.display="block";
		document.getElementById("hideid").innerHTML='&nbsp'+"You are logged in as "+user;
		document.getElementById('hideform').style.display="block";
		}

    }
</script>

</head>
<body onload="checklog()">
<header> <img src="nsbm.jpg" alt='Logo'><div><h3> NSBM GREEN UNIVERSITY LERNING MANEGEMENT SYSTEM</h3></div>
  <div id="header_div1"><marquee> <h4>  Recognizing the trends in technology and globalization, NSBM has designed an alternative and innovative approach to higher education to prepare young people to face new challenges of the world. As a degree school which enables its students to experience the future of higher education NSBM is encouraging their students to deal with sophisticated technology throughout their academic life. “e-Learning Management System” is the novel initiative taken up by NSBM to give hi-tech exposure to the students in order to pursue their studies in virtual terms. Through this learning process learners can communicate with their lecturers, their peers, and access learning materials, over the Internet or other computer networks. This area provides you with a wealth of information and resources designed to enrich student’s experience at NSBM. From information on registration, fees and exams to student support services and who to contact for academic advice, you’ll find it all here in one place.</h4></marquee></div>
</header>
<!--<center>-->
<nav>
	<ul>
   
    	<li id="headerhome"><a href="../Home.html">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li id="hide"><a href="#">Support</a></li>
        <li><a href="#">Events</a></li>
        <div id="hidehide"><h5 id="hideid"></h5><form method="post" action="logout.php" id="hideform"><button type="submit" >Log out</button></form></div>
        <div id='inside'><p id="inside_p">You are not logged in(<a href="login.php" id="inside_anchar">Log In</a>)</p></div>
    </ul>
</nav>
<!--</center>-->
<script>
function funccall(return_data){

				document.getElementById('formdiv').style.display='none';
				document.getElementById('bottomleft').innerHTML=return_data;


	
	}


function ajax_post(){
 // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
	// Create some variables we need to send to our PHP file
    var url = "action.php";
    var fn = document.getElementById("username").value;
    var ln = document.getElementById("password").value;
	var vars = "username="+fn+"&password="+ln;
	hr.open("POST", url, true);
	// Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object

	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			funccall(return_data);
	    }
		
    }

	// Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("insidep1").innerHTML = "processing...";
	}
</script>
<div id="bottomleft">
	<center><h4 id="innerhtml"></h4></center>
    <center><img src="" id="addidimg" width="100px" height="100px"/></center>
    <center><a id="addidlink" href="#">Click here to log in to your account</a></center>
   
    <div id="formdiv">
    <form method="post" id="form123" name="formlog" action="action1.php">
        <label>User name :</label><br>
        <input type="text" placeholder="Username" id="username" name="username" required/><br>
        <label>Password :</label><br>
        <input type="password" placeholder="Password" id="password" name="password" required /><br>
        <input type="submit" value="log in" >
    </form>
    </div>
	
</div>

<aside class="topleft">
	<div>
    	<ul>
        	<li><a href="#">NSBM Research Publications</a></li>
            <li><a href="#">NSBM Quarterly News</a></li>
            <li><a href="#">Award Handbooks</a></li>
            <li><a href="#">Regulations</a></li>
            <li><a href="#">Examination Time Tables</a></li>
            <li><a href="#">Class Time Tables</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Library Catalog</a></li>
            <li><a href="#">Plymouth DLE</a></li>
        </ul>
    </div>
</aside>
   <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffff66&amp;src=lakith1995%40gmail.com&amp;color=%2329527A&amp;ctz=Asia%2FColombo" style="border:solid 1px #777"></iframe>
	<div id="Content1">
    
<!--<center>-->
<div class="main">
	<!--ADD WARNING pages-->

    	<figure><a href="../MANAGEMENT.html"><img id="img_1" src="manegemant.jpg" alt="Manegement">
        <div class="figcaption1"><span>SCHOOL OF MANAGEMENT</span></div></a></figure> </div>
            <div id="latestnews"><h3 id="latestnewshd"> Latest news </h3>
            
            	<ul id="latestnewsul">
                	<li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
            	</ul>
            </div>
              
             
             
     <video width="280px" height="230px" controls>
        <source src="video.mp4" type="video/mp4">
    </video>
		<div id="googleMap" style=""></div>
		
    <div id="Content2">
   	    <a href="../computer_new.html"><figure><img id="img_2" src="Engineering.jpg" alt="Computing">
        <div class="figcaption2"><span>SCHOOL OF COMPUTING</span></div></figure></a>
		</div>
        
        <div id="upcomingevents"><h3 id="upcomingeventshd">Upcoming Events</h3>
        	<ul id="upcomingeventsul">
                	<li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
                    <li>Sample Latest NewsSample Latest NewsSample</li>
            </ul>
        
        </div>  
    
   	<div id="Contactinfo"><h3 id="hdcontactinfo">Contact info<hr></h3>
    <p id="pgcotactinfo"> 
    309, High Level Road,<br>
	Colombo 05,<br>
	00500,<br>
	Sri Lanka.<br>
	Tel: +94 (11) 544 5000<br>
	Fax: +94 (11) 544 5009<br>
	Email: info@nsbm.lk<br></p></div>
    <div id="Content3">
       	<figure><a href="../ENGINEERING.html"><img id="img_3" src="Engineering.jpg" alt="Engineering">
        <div class="figcaption3"><span>SCHOOL OF ENGINEERING</span></div></a></figure>
    </div>
    
</div>
<!--</center>-->

<footer id="footer1"><img src="banner-logos.png" id="footerimg" alt="footerlogo"/> </footer>
<footer id="footer2">Copyright © 2016 National School of Business Management. All Rights Reserved.</footer>
<p id="validate1">
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>

<p id="validate2">
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Valid CSS!" />
    </a>
</p>
<p id="validate3">
<a href="http://validator.w3.org/check/referer">
<img src = "http://www.w3.org/Icons/valid-xhtml11"
alt="Validate" />
</a>
</P> 
</body>
</html>
