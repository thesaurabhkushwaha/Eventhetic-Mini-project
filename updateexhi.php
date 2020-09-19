<html>
<body>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
</head>
<title>Update table</title>

<form method="POST">
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">UPDATE TABLE</font></b></p>


<p style="font-size:25px"align="center" ><font face="comic sans ms" color="indigo">Enter attribute to be updated:</font>
<input type="text" name="aname"><br><br>
<p style="font-size:25px"align="center" ><font face="comic sans ms" color="indigo">Enter key value of tuple to be updated:</font>
<input type="text" name="icode"><br><br>
<p style="font-size:25px"align="center" ><font face="comic sans ms" color="indigo">Enter updated value:</font>
<input type="text" name="value"><br><br>

<input style="height:40px;width:60px" type="submit" name="update" value="Update"></p>
</form>

<?php
     
	  if(isset($_POST["update"]))
	  {
		DEFINE ('DB_USER', 'studentweb');
		DEFINE ('DB_PASSWORD', 'hoihoi');
		DEFINE ('DB_HOST', 'localhost');
		DEFINE ('DB_NAME', 'exhibition');
 
	     $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		 $aname=$_POST['aname'];
		 $icode=$_POST['icode'];
		 $value=$_POST['value'];
		 
		 
		 $qry="UPDATE exhibition set $aname='$value' where ecode='$icode'  ";
		 $result=mysqli_query($dbc,$qry);
		 if($result)
		 {
			 echo"Updated successfully  !";
		 }	 
		 else 
		 {
 			 echo"Update error  !";
		 }
mysqli_close($dbc);
	  }
?>	
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getexhiinfo.php">Display Exhibition list</a> </p>

</body>
</html>