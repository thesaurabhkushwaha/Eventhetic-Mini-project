<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
</head>
<body>
<title>Delete from table</title>
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">DELETE TABLE ROW</font></b></p>

<form method="POST">
<p style="font-size:25px"align="center" ><font face="comic sans ms" color="indigo">Enter key to be deleted:</font>
<input type="text" name="icode"><br><br>
<input style="height:40px;width:60px" type="submit" name="delete" value="Delete">
</form>

<?php
     
	  if(isset($_POST["delete"]))
	  {
		DEFINE ('DB_USER', 'studentweb');
		DEFINE ('DB_PASSWORD', 'hoihoi');
		DEFINE ('DB_HOST', 'localhost');
		DEFINE ('DB_NAME', 'exhibition');
 
	     $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		 $icode=$_POST['icode'];
		 

		 
		 $qry="delete from exhibition where ecode='$icode'  ";
		 $result=mysqli_query($dbc,$qry);
		 if($result)
		 {
			 echo"Deletion successful  !";
		 }	 
		 else 
		 {
 			 echo"Deletion error  !";
		 }
mysqli_close($dbc);
	  }
?>	  
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getexhiinfo.php">Display Exhibition list</a> </p>



</body>
</html>