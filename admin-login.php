<html>
<head>
<style>
div.heading {
	float:left ;
	position:relative;
	border: 5px solid lightblue ;
	border-radius:100px;
	background-color:lightgreen;
    padding: 5px 8px;
    margin: 20px 550px;
	height:125px; 
	width:450px;
    }
div.login {
	float:left ;
	
	border: 5px solid lightblue ;
	background-color:lightgreen;
	border-radius:150px;
    padding: 5px 80px;
    margin: -25px 480px;
	height:200px; 
	width:450px;
    }	
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}

</style>
<title>Admin Login</title>
</head>
<body>
<div class="heading">
<p style="font-size:40px" align="center"><b><font face="georgia" color="olive">ADMIN LOGIN</font></b></p>
</div>

<form  method="POST">
 <div class="login">
 <p  style="font-size:25px"align="center"><font face="comic sans ms" color="brown">Admin-name : </font>
<input type="text" name="name" size="30" value="" />
</p>
<p  style="font-size:25px"align="center"><font face="comic sans ms" color="brown">Secret code : </font>
<input type="text" name="pass" size="30"  />
</p>
<p align="center"><BR>
<input style="height:40px;width:70px" type="submit" name="submit" value="VERIFY" />
</p>
</div>
</form>
</div>	


<?php

 if(isset($_POST["submit"]))
 {
	 $name=$_POST["name"];
	 $pass=$_POST["pass"];
	 
DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD', 'hoihoi');
DEFINE ('DB_HOST', 'localhost');

 
 $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(! $dbc)
{
    die('Connection Failed'.mysql_error());
}

mysqli_select_db($dbc,'exhibition');

$qry="SELECT name,password FROM admin";
$result= @mysqli_query($dbc,$qry);

$row = mysqli_fetch_array($result);

if($row["name"]==$name && $row["password"]==$pass)
{
	
	echo 'VALIDATION SUCCESSFULL <a href="http://localhost:1234/Exhibition/admin-ui.php"> OPEN ADMIN UI</a>';
}	
else
    echo"Sorry, your credentials are not valid, Please try again.";
 }
?>
	
</body>
</html>
