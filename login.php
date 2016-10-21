<?php
session_start();

if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	header("Location: Home.php");
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
	header("Location: Home.php");
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	margin-bottom:2%;
	background:#FFF;
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
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}



 .password{
       width: 46.5%; 
	   height:670px;
	   position:absolute;  
 }

  .bottem-Right{

    margin: auto;
   
    border: 3px solid #73AD21;
    padding: 10px;
    float: right;
    width: 50%;
	box-shadow: 1PX 1px 1px 1px #99FF99;


  } 

  .bottomleftmargin{

   margin: auto;
    border: 2px solid #73AD21;
	box-shadow: 1PX 1px 1px 1px #99FF99;
    padding: 20px;
    width: 43.5%;
    float: left;
    height: 74.3%;
	position:absolute;
  }


input[type=text],input[type=password]{
	width:100%;
	padding:10px;
	
	}
  


#footer1{
	width:100%;
	height:170px;

	
	}
#footerimg{
	height:100%;
	width:100%;
	margin-top:20px

	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	position:absolute;
	margin-top:53.5%;
	width:96.9%;
	border-radius:0px 0px 2px 2px ;
	margin-bottom:2px;
	}

  

</style>

</head>

    <body>

<body>
<header> <img src="nsbm.jpg" alt='Logo'><div><h3> NSBM GREEN UNIVERSITY LERNING MANEGEMENT SYSTEM</h3></div>
  <div id="header_div1"><marquee> <h4>  Recognizing the trends in technology and globalization, NSBM has designed an alternative and innovative approach to higher education to prepare young people to face new challenges of the world. As a degree school which enables its students to experience the future of higher education NSBM is encouraging their students to deal with sophisticated technology throughout their academic life. “e-Learning Management System” is the novel initiative taken up by NSBM to give hi-tech exposure to the students in order to pursue their studies in virtual terms. Through this learning process learners can communicate with their lecturers, their peers, and access learning materials, over the Internet or other computer networks. This area provides you with a wealth of information and resources designed to enrich student’s experience at NSBM. From information on registration, fees and exams to student support services and who to contact for academic advice, you’ll find it all here in one place.</h4></marquee></div>
</header>

<nav>
	<ul>
   
    	<li id="headerhome"><a  href="Home.html">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">Events</a></li>
        <div id='inside'><p id="inside_p">You are not logged in(<a href="#">Log In </a>)</p></div>
    </ul>
</nav>
        

<div id="pasword" class="password">
 </div>

  

  <div class="bottomleftmargin">
    <div class="container">
    <form action="action1.php" method="post">
      <label><b>Username</b></label><br>


      <input type="text" placeholder="Enter Username" name="username" required/>
      <br><br>
      <label><b>Password</b></label>
      <br>
      <input type="password" placeholder="Enter Password" name="password" required/><br><br>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
      </form>
    </div>
</div>

 

  <div class="bottem-Right">
   <h2> IS THIS YOUR FIRST TIME HERE?</h2>
   <p> Hi! For full access to courses you'll need to take a minute to create a new account for yourself on NSBM e- learning site. Each of the individual courses may also have a one-time "enrolment key", which you won't need until later. Here are the steps:</p>
    
    <h4>1. Fill out the New Account form with your details.</h4>
    
    </h4>2. Index Number should be same as it is your Student ID Card Number.</h4>
   <h4> Eg:- BSC-UCD-MIS-12-1-142</h4>
   

   <h4>3. Name also should be same as it is your Student ID Card Name.</h4>
   

<h4>Eg:- Samarasekara H J K M</h4> 


<h4>4. An email will be immediately sent to your email address.</h4>

<h4>5. Read your email, and click on the web link it contains.</h4>

<h4>5. Your account will be confirmed and you will be logged in.</h4>

<h4>6. Now, select the course you want to participate in.</h4>

<h4>7. If you are prompted for an "enrolment key" - use the one that your 
teacher has given you. This will "enrol" you in the course.</h4>

<h4>8. You can now access the full course. From now on you will only need to 
enter your personal username and password (in the form on this page) to 
log in and access any course you have enrolled in.</h4>


</div>



<footer id="footer1"><img src="banner-logos.png" id="footerimg" /> </footer>
<footer id="footer2">Copyright @ National School of Business Management No 309, High Level Road, Colombo 05, Sri Lanka. 
Telephone: +94(11) 567 2545|5673535 - Email:info@nsbm.lk</footer>






  </body>

  </html>


