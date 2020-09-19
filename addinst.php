<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Institution</title>
</head>
<body>

<form action="http://localhost:1234/Exhibition/instadded.php" method="post">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW INSTITUTION</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Institution's Code:</font>
<input type="text" name="icode" size="30" value="" />
</p>
 
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Institution's Name:</font>
<input type="text" name="iname" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Institution's Location:</font>
<input type="text" name="ilocation" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Head of Institution:</font>
<input type="text" name="ihead" size="30" />
</p>

 
<p align="center"><BR>
<input style="height:40px;width:70px" type="submit" name="submit" value="Register" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getinstinfo.php">Display Institution list</a> 
<a href="http://localhost:1234/Exhibition/admin-ui.php"><br>Admin UI</a> </p>
</form>
</body>
</html>