<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Event</title>
</head>
<body>

<form action="http://localhost:1234/Exhibition/eveadded.php" method="POST">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW EVENT</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Event Code:</font>
<input type="text" name="evecode" size="30"  />
</p>
 <p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Event name:</font>
<input type="text" name="evename" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Event time (HH:MM):</font>
<input type="text" name="evetime" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue">Exhibition code:</font>
<input type="text" name="ecode" size="30" />
</p>

 
<p align="center"><br>
<input style="height:40px;width:70px" type="submit" name="submit" value="Submit" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/geteveinfo.php">Display Event list</a> 
<a href="http://localhost:1234/Exhibition/admin-ui.php"><br>Admin UI</a></p>
</form>
</body>
</html>