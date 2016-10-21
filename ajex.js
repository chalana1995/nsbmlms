function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	    return true;	
	}
}

//example.html

<!DOCTYPE html>
<html>
<head>
<script src="js/ajax.js"></script>
<script>
// Ajax Usage Example
var ajax = ajaxObj("POST", "parser.php");
ajax.onreadystatechange = function() {
	if(ajaxReturn(ajax) == true) {
	    alert(ajax.responseText);
	}
}
ajax.send("name=George&country=USA");
</script>
</head>
<body>
</body>
</html>


//ajax.js


function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	    return true;	
	}
}




//parser.php



<?php
if(isset($_POST["name"])){
    echo $_POST["name"]." is from ".$_POST["country"];
	exit();
}
?>

