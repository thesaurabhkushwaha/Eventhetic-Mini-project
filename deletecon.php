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
<title>Delete from Contact table</title>
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">DELETE CONTACT TABLE ROW</font></b></p>

<form method="POST">
<p style="font-size:25px"align="center" ><font face="comic sans ms" color="indigo">Enter CID to be deleted:</font>
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
		 

		 
		 $qry="delete from contact where cid='$icode'  ";
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
<a href="http://localhost:1234/Exhibition/getconinfo.php">Display Contact list</a> </p>



</body>
</html>