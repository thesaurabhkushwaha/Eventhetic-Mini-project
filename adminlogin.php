<html>
<head>
<title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url("carbackblue.png");
      background-size:  cover; 
    
    }
  	#log {
  		height:260px;
  		width: 500px;
  		margin-left: 520px;
  		border: 2px solid lightblue;
		border-radius:20px;
		background-color: lightblue;
  	}
  	#logbut{
  		margin-left: 215px;
  	}
  	#title {
  		height:80px;
  		width: 500px;
  		margin-left: 520px;
  		margin-top: 120px;
  		border: 2px solid darkgreen;
		border-radius:20px;
		background-color: lightgreen;
  	}
  </style>	
<title>Admin Login</title>
</head>
<body>
  <img src="logoue.png" alt=""width="1540" height="150">
 
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" style="padding-left:75px;"href="http://localhost:1234/Exhibition/front.php"><b>Home</b></a>
    </li>
    
    <li class="nav-item active">
      <a class="nav-link " href="http://localhost:1234/Exhibition/upcomingevents.php"><b>Explore </b></a>
    </li>

    

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/aboutus.php" ><b>About Us</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/contactus.php" ><b>Contact Us</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" style="padding-left:950px;"href="http://localhost:1234/Exhibition/adminlogin.php"><b>Admin login</b></a>
    </li>
  </ul>
</nav>


<br><br><br>
<div id="log">
<form method="POST">
    <div class="form-group">
      <br>
      <label style="font-size:25px"><b>Enter Username :</b></label>
      <input type="text" class="form-control" placeholder="" name="name" required>

      <label style="font-size:25px"><b>Enter Password :</b></label>
      <input type="password" class="form-control" placeholder="" name="pass" required>     
   
    </div>   
    <input id="logbut" type="submit" name="submit" value="LOGIN" target="_blank" class="btn btn-success"/>
  </form>
</div>
</div>	


<?php
 
 if(isset($_POST["submit"]))
 {
	 $name=$_POST["name"];
	 $pass=$_POST["pass"];
	 
	 $pass=md5($pass);
	 
DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD', 'hoihoi');
DEFINE ('DB_HOST', 'localhost');

 
 $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(! $dbc)
{
    die('Connection Failed'.mysql_error());
}

mysqli_select_db($dbc,'exhibition');
$qry = "SELECT * FROM admin WHERE name='$name' AND password='$pass'";

//$qry="SELECT name,password FROM admin";
$res= @mysqli_query($dbc,$qry);

$row = mysqli_fetch_array($res);
if($row["name"]==$name && $row["password"]==$pass)

	{
		//$row = mysqli_fetch_array($res);
		session_start();		
		$id = $row['id']; $ip = $_SERVER['REMOTE_ADDR'];
		$_SESSION['admin'] = $row['id'];
		$_SESSION['user'] = $name;
		$link = "UPDATE admin SET`date`=NOW(),`ip`='$ip' WHERE id='$id'";
		$res = mysqli_query($dbc,$link) or die(mysqli_error($dbc));	
		header("Location:http://localhost:1234/Exhibition/instab.php");

	}
else
    echo'<script type="text/javascript">
                  alert("INCORRECT CREDENTIALS !!")
                  </script>';	


 }
?>
	<br><br><br><br><br><br><div style="background-color: lightblue;">
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://localhost:1234/Exhibition/front.php"> Eventhetic.com</a>
  </div>
  <!-- Copyright -->

</footer>
</div>
</body>
</html>
