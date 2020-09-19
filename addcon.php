<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Contact</title>
</head>
<body>

<form action="http://localhost:1234/Exhibition/conadded.php" method="POST">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW EXHIBITION CONTACT</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Contact ID:</font>
<input type="text" name="cid" size="30"  />
</p>
 <p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Contact name:</font>
<input type="text" name="name" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Contact Number:</font>
<input type="text" name="contactnumber" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue">Exhibition code:</font>
<input type="text" name="ecode" size="30" />
</p>

 
<p align="center"><br>
<input style="height:40px;width:70px" type="submit" name="submit" value="Submit" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getconinfo.php">Display Contact list</a> 
<a href="http://localhost:1234/Exhibition/admin-ui.php"><br>Admin UI</a></p>
</form>
</body>
</html>